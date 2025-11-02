<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'department_id' => 1,
            'name' => 'Heaven Ade Aldrico',
            'email' => '22081010158@student.upnjatim.ac.id',
            'registration_number' => '22081010158',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('pastibisa'),
        ]);

        User::create([
            'type' => 'lecturer',
            'department_id' => 1,
            'name' => 'Dosen',
            'email' => 'dosen@example.com',
            'registration_number' => '198503201999031001',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('pastibisa'),
        ]);
    }
}
