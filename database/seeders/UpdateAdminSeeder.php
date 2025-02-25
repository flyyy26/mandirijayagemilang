<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Ganti dengan model User Anda
use Illuminate\Support\Facades\Hash;

class UpdateAdminSeeder extends Seeder
{
    public function run()
    {
        $admin = User::find(1); // Ganti 1 dengan ID admin yang sesuai

        if ($admin) {
            $admin->email = 'admin@bintangplafonpvcgroup.com';
            $admin->password = Hash::make('bintangplafon@2024_'); // Ganti dengan password baru
            $admin->save();
        }
    }
}

