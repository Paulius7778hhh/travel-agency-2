<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'John',
            'email' => 'johndoe@gmail.com',
            'password' => Hash::make('399'),
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'Boni',
            'email' => 'jonbovi@gmail.com',
            'password' => Hash::make('993'),
            'role' => 'user',
        ]);
        $faker = Faker::create();
        /*
        foreach (range(0, 20) as $_) {
            DB::table('users')->insert([
                'name' => $faker->'',
                'email' => $faker->'',
                'email_verified_at' => $faker->'',
                'password' => $faker->'',
                'role' => $faker->'',
            ]);
        }
        */
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        foreach (range(0, 10) as $_) {
            DB::table('countries')->insert([
                'title' => $faker->unique()->state(),
                'season_start' => $faker->date('Y-m-d', 'now'),
                'season_end' => $faker->date('Y-m-d', 'now'),
            ]);
        }
        foreach (range(0, 40) as $_) {
            DB::table('hotels')->insert([
                'title' => $faker->unique()->company(),
                'picture' => $faker->image(public_path('pictures'), 300, 300, 'color', false),
                'trip_length' => rand(2, 20),
                'price' => rand(0, 5) < 3 ? rand(300, 2000) : rand(2000, 10000),
                'country_id' => rand(1, 10),
                'description' => $faker->realText(rand(20, 200),  rand(2, 5)),
            ]);
        }
        /*
        foreach(range(0,10) as $_){
            DB::table('orders')->insert([
                'user_id' => $faker->'',
                'order_json' => $faker->'',
                'status' => $faker->'',
            'title' => $faker->'',
            'title' => $faker->'',
            'title' => $faker->'',
            ]);
        }
        */
    }
}
