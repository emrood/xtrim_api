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
                    'name' => 'Session',
                    'price' => 2.5,
                ],
                [
                    'id' => 2,
                    'name' => 'Bodybuilding Standard',
                    'price' => 65,
                ],
                [
                    'id' => 3,
                    'name' => 'Bodybuilding silver',
                    'price' => 75,
                ],
                [
                    'id' => 4,
                    'name' => 'Bodybuilding premium',
                    'price' => 95,
                ],
                [
                    'id' => 5,
                    'name' => 'Dance standard',
                    'price' => 45,
                ],
                [
                    'id' => 6,
                    'name' => 'Dance silver',
                    'price' => 65,
                ],
                [
                    'id' => 7,
                    'name' => 'Dance premium',
                    'price' => 80,
                ],
            ]);
    }
}
