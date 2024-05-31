<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    $user = User::where('TenDangNhap', 'minh123@gmail.com')->first();
    if (empty($user)) {
        User::factory()->create([
            'TenNguoiDung' => 'minh',
            'TenDangNhap' => 'minh123@gmail.com',
            'MatKhau' => Hash::make('123')
        ]);
    }
    }
}
