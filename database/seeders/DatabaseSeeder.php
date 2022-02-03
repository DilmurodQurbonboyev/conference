<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ListTypeSeeder;
use Database\Seeders\BackUp\RoleSeeder;
use Database\Seeders\BackUp\UserSeeder;
use Database\Seeders\BackUp\ListSeeder;
use Database\Seeders\BackUp\MenuSeeder;
use Database\Seeders\BackUp\MessageSeeder;
use Database\Seeders\BackUp\UserDataSeeder;
use Database\Seeders\BackUp\McategorySeeder;
use Database\Seeders\BackUp\ManagementSeeder;
use Database\Seeders\BackUp\PermissionSeeder;
use Database\Seeders\BackUp\ModelHasRoleSeeder;
use Database\Seeders\BackUp\ListCategorySeeder;
use Database\Seeders\BackUp\MenusCategorySeeder;
use Database\Seeders\BackUp\MenuTranslationSeeder;
use Database\Seeders\BackUp\ListsTranslationSeeder;
use Database\Seeders\BackUp\RoleHasPermissionSeeder;
use Database\Seeders\BackUp\MessageTranslationSeeder;
use Database\Seeders\BackUp\McategoryTranslationSeeder;
use Database\Seeders\BackUp\ManagementTranslationSeeder;
use Database\Seeders\BackUp\ListCategoryTranslationSeeder;
use Database\Seeders\BackUp\MenusCategoryTranslationSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(UserDataSeeder::class);
        $this->call(ListTypeSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(ModelHasRoleSeeder::class);
        $this->call(RoleHasPermissionSeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(MessageTranslationSeeder::class);
        $this->call(ListCategorySeeder::class);
        $this->call(ListCategoryTranslationSeeder::class);
        $this->call(ListSeeder::class);
        $this->call(ListsTranslationSeeder::class);
        $this->call(MenusCategorySeeder::class);
        $this->call(MenusCategoryTranslationSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(MenuTranslationSeeder::class);
        $this->call(McategorySeeder::class);
        $this->call(McategoryTranslationSeeder::class);
        $this->call(ManagementSeeder::class);
        $this->call(ManagementTranslationSeeder::class);
    }
}
