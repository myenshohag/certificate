<?php

namespace Database\Seeders;

use App\Models\Category;
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
        $categories = [
            'Starters',
            'Sandwiches and Burgers',
            'Heroes',
            'Salads',
            'Main Course',
            'Vegetable Entrees',
            'Specialty Rice',
            'Noodles and Pasta',
        ];
        foreach ($categories as  $value) {
            Category::create([
                'name' => $value,
            ]);
        }
    }
}
