<?php

namespace Database\Seeders\BackUp;

use Illuminate\Database\Seeder;
use File;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/users.json");
        $users = json_decode($json);

        foreach ($users as $key => $user) {
            User::create([
                "id" => $user->id,
                "name" => $user->name,
                "email" => $user->email,
                "email_verified_at" => $user->email_verified_at,
                "password" => $user->password,
                "remember_token" => $user->remember_token,
                "dark_mode" => $user->dark_mode,
                "color" => $user->color,
                "created_at" => $user->created_at,
                "updated_at" => $user->updated_at
            ]);
        }
    }
}
