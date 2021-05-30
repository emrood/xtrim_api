<?php

use Illuminate\Database\Seeder;

class PricingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        \Illuminate\Support\Facades\DB::table('pricings')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'Standard',
                    'price' => 65,
                ],
                [
                    'id' => 2,
                    'name' => 'Silver',
                    'price' => 75,
                ],
                [
                    'id' => 3,
                    'name' => 'Premium',
                    'price' => 95,
                ],
            ]);
    }
}
