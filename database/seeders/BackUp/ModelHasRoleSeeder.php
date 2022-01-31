<?php

namespace Database\Seeders\BackUp;

use File;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelHasRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/model_has_roles.json");
        $modelHasRoles = json_decode($json);

        foreach ($modelHasRoles as $key => $role) {
            DB::table('model_has_roles')->insert([
                "role_id" => $role->role_id,
                "model_type" => $role->model_type,
                "model_id" => $role->model_id
            ]);
        }
    }
}
