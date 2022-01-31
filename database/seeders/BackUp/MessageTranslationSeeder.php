<?php

namespace Database\Seeders\BackUp;

use Illuminate\Database\Seeder;
use App\Models\MessageTranslation;
use File;

class MessageTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/message_translations.json");
        $messages = json_decode($json);

        foreach ($messages as $key => $message) {
            MessageTranslation::create([
                "id" => $message->id,
                "message_id" => $message->message_id,
                "title" => $message->title,
                "locale" => $message->locale,
                "created_at" => $message->created_at,
                "updated_at" => $message->updated_at
            ]);
        }
    }
}
