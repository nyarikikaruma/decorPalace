<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Item;
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
        // \App\Models\User::factory(10)->create();
        Item::factory(20)->create();
        Cart::factory(10)->create();

    }
}
