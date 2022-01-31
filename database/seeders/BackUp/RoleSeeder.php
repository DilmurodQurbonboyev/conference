<?php

namespace Database\Seeders\BackUp;

use Illuminate\Database\Seeder;
use File;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/roles.json");
        $roles = json_decode($json);

        foreach ($roles as $key => $role) {
            Role::create([
                "id" => $role->id,
                "name" => $role->name,
                "guard_name" => $role->guard_name,
                "created_at" => $role->created_at,
                "updated_at" => $role->updated_at
            ]);
        }
    }
}
