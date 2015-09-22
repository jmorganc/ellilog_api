<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BabyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('babies')->insert([
            'first_name' => 'Elliot',
            'last_name' => 'Campbell',
            'active' => true,
            'created_at' => date('Y-m-d H:m:s'),
            // 'updated_at' => $faker->dateTime()
        ]);

        foreach(range(1, 5) as $index)
        {
            DB::table('babies')->insert([
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'active' => $faker->boolean(),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => $faker->dateTime()
            ]);
        }
    }
}
