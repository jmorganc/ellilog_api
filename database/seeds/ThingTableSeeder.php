<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ThingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 5) as $index)
        {
            DB::table('things')->insert([
                'thing' => str_random(5),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => $faker->dateTime()
            ]);
        }
    }
}
