<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        \App\User::create([
            'name' => 'admin',
            'email' => 'admin@xtrimfit.com',
            'role' => 'Administrateur',
            'phone' => '37396810',
            'password' => \Illuminate\Support\Facades\Hash::make('admin123')
        ]);

        \Illuminate\Support\Facades\DB::table('pricings')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'bodybuilding session',
                    'price' => 5,
                    'billing' => 'session',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ],
                [
                    'id' => 2,
                    'name' => 'Spa session',
                    'price' => 20,
                    'billing' => 'session',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ],
                [
                    'id' => 3,
                    'name' => 'Massage room session',
                    'price' => 25,
                    'billing' => 'session',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ],
                [
                    'id' => 4,
                    'name' => 'Bodybuilding Standard',
                    'price' => 65,
                    'billing' => 'abonnement',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),

                ],
                [
                    'id' => 5,
                    'name' => 'Bodybuilding premium',
                    'price' => 95,
                    'billing' => 'abonnement',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ],
                [
                    'id' => 6,
                    'name' => 'Dance standard',
                    'price' => 45,
                    'billing' => 'abonnement',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ],
                [
                    'id' => 7,
                    'name' => 'Dance premium',
                    'price' => 80,
                    'billing' => 'abonnement',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ],
            ]);

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

        \Illuminate\Support\Facades\DB::table('rates')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'USD',
                    'value' => 1,
                    'editable' => 0,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ],
                [
                    'id' => 2,
                    'name' => 'HTG',
                    'value' => 110,
                    'editable' => 1,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ],
                [
                    'id' => 3,
                    'name' => 'CAD',
                    'value' => 1.3,
                    'editable' => 1,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ],
                [
                    'id' => 4,
                    'name' => 'PES',
                    'value' => 65,
                    'editable' => 1,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ],
            ]);


        \Illuminate\Support\Facades\DB::table('devices')->insert(
            [
                'id' => 1,
                'device_name' => 'Laptop Noel Emmanuel Roodly',
                'fingerprint' => '61854ea9227d1998e762c4264890c0e4',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]
        );
    }
}
