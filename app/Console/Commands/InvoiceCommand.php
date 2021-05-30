<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class InvoiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoice:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //

        $customers = DB::table('customers')->where('active', 1)->get();

        foreach ($customers as $customer) {

            $this->info($customer->last_name);
            $last_invoice = DB::table('invoices')->where('customer_id', $customer->id)->orderByDesc('from_date')->first();

            if ($last_invoice) {
                if ($last_invoice->status === 'Pending') {
                    $this->warn('Last invoice is unpaid for ' . $customer->first_name . ' DIFF = ' . Carbon::now()->diffInDays(Carbon::createFromFormat('Y-m-d', $last_invoice->to_date)));
                    if (Carbon::now()->diffInDays(Carbon::createFromFormat('Y-m-d', $last_invoice->to_date)) <= 0) {
                        DB::table('invoices')->where('id', $last_invoice->id)->update(['status' => 'Unpaid']);
                    } else {
                        $this->warn($last_invoice->invoice_number . ' is still active');
                    }
                } elseif ($last_invoice->status === 'Unpaid') {
                    // TODO created next invoice if not present
                    $this->warn(' do not have pending invoice..creating | only unpaid');
                    $pricing = DB::table('pricings')->find($customer->pricing_id);

                    $input = DB::table('invoices')->selectRaw('COUNT("*") as qty')->where('customer_id', $customer->id)->first()->qty;
//                  dd($input);
                    if ($pricing) {
                        DB::table('invoices')->insert(
                            [
                                'invoice_number' => $this->invoice_num($input + 1, 7, 'XF' . $customer->id . '-'),
                                'customer_id' => $customer->id,
                                'pricing_id' => $customer->pricing_id,
                                'price' => $pricing->price,
                                'fees' => 0,
                                'discount_percentage' => 0,
                                'taxe_percentage' => 0,
                                'total' => $pricing->price,
                                'from_date' => Carbon::createFromFormat('Y-m-d', $last_invoice->to_date)->addDay()->toDateString(),
                                'to_date' => Carbon::createFromFormat('Y-m-d', $last_invoice->to_date)->addDay()->addMonth()->toDateString(),
                                'status' => 'Pending',
                                'created_at' => Carbon::now(),
                                'updated_at' => Carbon::now(),

                            ]
                        );
                    }
                }
            } else {
                // New client | first invoice
                $pricing = DB::table('pricings')->find($customer->pricing_id);
                if ($pricing) {
                    $this->info($pricing->name . ' plan UID: ' . $this->invoice_num(1, 7, 'XF' . $customer->id . '-'));
                    DB::table('invoices')->insert([
                        'invoice_number' => $this->invoice_num(1, 7, 'XF' . $customer->id . '-'),
                        'customer_id' => $customer->id,
                        'pricing_id' => $customer->pricing_id,
                        'price' => $pricing->price,
                        'fees' => 0,
                        'discount_percentage' => 0,
                        'taxe_percentage' => 0,
                        'total' => $pricing->price,
                        'from_date' => Carbon::createFromFormat('Y-m-d H:i:s', $customer->created_at)->toDateString(),
                        'to_date' => Carbon::createFromFormat('Y-m-d H:i:s', $customer->created_at)->addMonth()->toDateString(),
                        'status' => 'Pending',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                } else {
                    $this->warn('No valid plan found for ' . $customer->first_name . ' ' . $customer->last_name);
                }

            }
        }
    }


    function invoice_num($input, $pad_len = 7, $prefix = null)
    {
        if ($pad_len <= strlen($input))
            trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate invoice number', E_USER_ERROR);

        if (is_string($prefix))
            return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));

        return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
    }
}
