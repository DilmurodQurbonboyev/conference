<?php

namespace Database\Seeders;

use App\Models\ListType;
use Illuminate\Database\Seeder;

class ListTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listTypes = [
            'news',
            'posters',
            'answers',
            'concerns',
            'pages',
            'useful',
            'photos',
            'videos',
            'events',
            'managements',
        ];
        foreach ($listTypes as $type) {
            ListType::create([
                'title' => $type,
                'user_id' => 1,
            ]);
        }
    }
}
