<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Rafi Nur Maulana',
                'email' => 'rafi@filwork.site',
                'password' => bcrypt('123456')
            ], [
                'name' => 'Nurul Hasanah',
                'email' => 'ana@filwork.site',
                'password' => bcrypt('123456')
            ], [
                'name' => 'Masyithah Dwi Ratnadi',
                'email' => 'tata@filwork.site',
                'password' => bcrypt('123456')
            ], [
                'name' => 'Ainul Yaqin',
                'email' => 'yayan@filwork.site',
                'password' => bcrypt('123456')
            ]
        ];

        foreach ($userData as $key => $value) {
            User::create($value);
        }
    }
}
