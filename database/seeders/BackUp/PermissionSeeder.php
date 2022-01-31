<?php

namespace Database\Seeders\BackUp;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use File;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/permissions.json");
        $permissions = json_decode($json);

        foreach ($permissions as $key => $permission) {
            Permission::create([
                "id" => $permission->id,
                "name" => $permission->name,
                "guard_name" => $permission->guard_name,
                "created_at" => $permission->created_at,
                "updated_at" => $permission->updated_at
            ]);
        }
    }
}
