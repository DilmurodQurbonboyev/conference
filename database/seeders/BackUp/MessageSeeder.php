<?php

namespace Database\Seeders\BackUp;

use Illuminate\Database\Seeder;
use File;
use App\Models\Message;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/messages.json");
        $messages = json_decode($json);

        foreach ($messages as $key => $message) {
            Message::create([
                "id" => $message->id,
                "key" => $message->key,
                "created_at" => $message->created_at,
                "updated_at" => $message->updated_at
            ]);
        }
    }
}
