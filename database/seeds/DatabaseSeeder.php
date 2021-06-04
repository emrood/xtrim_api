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
                    'value' => 100,
                    'editable' => 1,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ],
//                [
//                    'id' => 3,
//                    'name' => 'CAD',
//                    'value' => 1.5,
//                    'editable' => 1,
//                    'created_at' => \Carbon\Carbon::now(),
//                    'updated_at' => \Carbon\Carbon::now(),
//                ],
//                [
//                    'id' => 4,
//                    'name' => 'PES',
//                    'value' => 95,
//                    'editable' => 1,
//                    'created_at' => \Carbon\Carbon::now(),
//                    'updated_at' => \Carbon\Carbon::now(),
//                ],
            ]);
    }
}
