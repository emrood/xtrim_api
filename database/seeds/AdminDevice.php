<?php

use Illuminate\Database\Seeder;

class AdminDevice extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

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
