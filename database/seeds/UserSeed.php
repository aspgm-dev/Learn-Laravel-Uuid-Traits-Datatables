<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'SuperAdmin',
            'email' => 'superadmin@superadmin.com',
            'password' => Hash::make('pass890'),
        ]);

        $faker = Faker::create();
        for($i = 0; $i < 30; $i++) {
	        DB::table('users')->insert([
                'id' => Uuid::getFactory()->uuid4()->toString(),
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('asdasdasd'),
                'created_at' => $faker->dateTime
	        ]);
        }
    }
}
