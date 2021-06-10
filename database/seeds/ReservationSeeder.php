<?php

use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \Illuminate\Support\Facades\DB::table('rooms')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'Sauna',
                    'price' => 20,
                    'color' => '#ede23b',
                    'available' => 1,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ],
                [
                    'id' => 2,
                    'name' => 'Massage',
                    'price' => 20,
                    'color' => '#eb2b23',
                    'available' => 1,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ]
            ]);
    }
}
