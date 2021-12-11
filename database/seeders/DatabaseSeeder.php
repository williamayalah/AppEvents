<?php

namespace Database\Seeders;

use App\Models\EventAssistant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->call(CategorySeeder::class);
        $this->call(EventSeeder::class);
        $this->call(EventDescriptionSeeder::class);
        $this->call(CategoryDescriptionSeeder::class);

    }
}
