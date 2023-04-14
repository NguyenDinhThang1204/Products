<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            DB::table('products')->insert([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'gender' => $faker->randomElement(['Male', 'Female']),
                'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
                'image' => $faker->image(), 
                'date' => $faker->dateTimeBetween(),
            ]);
        }
    }
}
