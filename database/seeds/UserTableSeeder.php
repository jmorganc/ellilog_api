<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
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
            DB::table('users')->insert([
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'email' => $faker->email(),
                'active' => $faker->boolean(),
                'last_login' => $faker->dateTime(),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => $faker->dateTime()
            ]);
        }
    }
}
