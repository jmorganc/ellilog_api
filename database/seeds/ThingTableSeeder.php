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

        DB::table('things')->insert([
            'thing' => 'Milk',
            'active' => true,
            'created_at' => date('Y-m-d H:m:s'),
            // 'updated_at' => $faker->dateTime()
        ]);
        DB::table('things')->insert([
            'thing' => 'Nap',
            'active' => true,
            'created_at' => date('Y-m-d H:m:s'),
            // 'updated_at' => $faker->dateTime()
        ]);
        DB::table('things')->insert([
            'thing' => 'Poop',
            'active' => true,
            'created_at' => date('Y-m-d H:m:s'),
            // 'updated_at' => $faker->dateTime()
        ]);
        DB::table('things')->insert([
            'thing' => 'Pee',
            'active' => true,
            'created_at' => date('Y-m-d H:m:s'),
            // 'updated_at' => $faker->dateTime()
        ]);
        DB::table('things')->insert([
            'thing' => 'Comment',
            'active' => true,
            'created_at' => date('Y-m-d H:m:s'),
            // 'updated_at' => $faker->dateTime()
        ]);

        // foreach(range(1, 5) as $index)
        // {
        //     DB::table('things')->insert([
        //         'thing' => str_random(5),
        //         'active' => $faker->boolean(),
        //         'created_at' => date('Y-m-d H:m:s'),
        //         'updated_at' => $faker->dateTime()
        //     ]);
        // }
    }
}
