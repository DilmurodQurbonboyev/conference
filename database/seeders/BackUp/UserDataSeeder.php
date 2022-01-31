<?php

namespace Database\Seeders\BackUp;

use Illuminate\Database\Seeder;
use File;
use App\Models\UserData;

class UserDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/user_data.json");
        $userData = json_decode($json);

        foreach ($userData as $key => $user) {
            UserData::create([
                "userid" => $user->userid,
                "birth_date" => $user->birth_date,
                "ctzn" => $user->ctzn,
                "per_adr" => $user->per_adr,
                "pport_issue_place" => $user->pport_issue_place,
                "sur_name" => $user->sur_name,
                "gd" => $user->gd,
                "natn" => $user->natn,
                "pport_issue_date" => $user->pport_issue_date,
                "pport_expr_date" => $user->pport_expr_date,
                "pport_no" => $user->pport_no,
                "pin" => $user->pin,
                "mob_phone_no" => $user->mob_phone_no,
                "user_id" => $user->user_id,
                "email" => $user->email,
                "birth_place" => $user->birth_place,
                "mid_name" => $user->mid_name,
                "valid" => $user->valid,
                "user_type" => $user->user_type,
                "ret_cd" => $user->ret_cd,
                "first_name" => $user->first_name,
                "full_name" => $user->full_name,
                "created_at" => $user->created_at,
                "updated_at" => $user->updated_at,
            ]);
        }
    }
}
