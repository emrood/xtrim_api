<?php

use Illuminate\Database\Seeder;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

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
                ]
            ]);
    }
}
