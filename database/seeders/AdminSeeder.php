<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin BUMA',
            'email' => 'admin@buma.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        echo "✅ Admin user berhasil dibuat!\n";
        echo "📧 Email: admin@buma.com\n";
        echo "🔑 Password: password123\n";
    }
}
