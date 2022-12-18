<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                "name" => 'Muhammed Ömer AKKAYA',
                "is_admin" => '1',
                "email" => 'omer@muhammedomer.com.tr',
                "gsm" => '5324972238',
                "password" => '$2y$10$FctATxc3GMmxstVIlnoyAuwJdUOEvgMrPzIWe3AYuzei.qRBPU9Li',            
            ],
        ]);
    }
}
