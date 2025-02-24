<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    // Menghapus pengguna dengan email yang sama jika ada
    User::where('email', 'test@example.com')->delete();

    // Membuat pengguna baru
    User::factory()->create([
        'name' => 'Test User',
        'email' => 'test@example.com',
    ]);
}

}
