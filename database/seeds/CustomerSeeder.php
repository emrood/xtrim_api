<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        \Illuminate\Support\Facades\DB::table('customers')->insert(
            [
                'id' => 1,
                'last_name' => 'Guest',
                'first_name' => 'Xtrim',
                'pricing_id' => 1,
                'email' => 'guest@xtrimfit.com',
                'phone' => '00000000',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]
        );
    }
}
