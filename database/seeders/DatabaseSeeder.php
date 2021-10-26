<?php

namespace Database\Seeders;

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
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);
        $this->call(PermissionsSeeder::class);

        $this->call(UserSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(TransfertSeeder::class);
        $this->call(TokenizerSeeder::class);
        $this->call(TransactionSeeder::class);
        $this->call(ShopSeeder::class);
        $this->call(RefuelingSeeder::class);
        $this->call(FavoriteSeeder::class);
    }
}
