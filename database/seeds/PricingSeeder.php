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
                    'name' => 'bodybuilding session',
                    'price' => 5,
                    'billing' => 'session'
                ],
                [
                    'id' => 2,
                    'name' => 'Spa session',
                    'price' => 20,
                    'billing' => 'session'
                ],
                [
                    'id' => 3,
                    'name' => 'Massage room session',
                    'price' => 25,
                    'billing' => 'session'
                ],
                [
                    'id' => 4,
                    'name' => 'Bodybuilding Standard',
                    'price' => 65,
                    'billing' => 'abonnement'

                ],
                [
                    'id' => 5,
                    'name' => 'Bodybuilding premium',
                    'price' => 95,
                    'billing' => 'abonnement'
                ],
                [
                    'id' => 6,
                    'name' => 'Dance standard',
                    'price' => 45,
                    'billing' => 'abonnement'
                ],
                [
                    'id' => 7,
                    'name' => 'Dance premium',
                    'price' => 80,
                    'billing' => 'abonnement'
                ],
            ]);
    }
}
