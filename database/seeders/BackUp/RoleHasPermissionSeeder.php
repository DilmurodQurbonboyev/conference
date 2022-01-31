<?php

namespace Database\Seeders\BackUp;

use File;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/role_has_permissions.json");
        $roleHasPermissions = json_decode($json);

        foreach ($roleHasPermissions as $key => $role) {
            DB::table('role_has_permissions')->insert([
                "permission_id" => $role->permission_id,
                "role_id" => $role->role_id,
            ]);
        }
    }
}
