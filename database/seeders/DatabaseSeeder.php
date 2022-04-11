<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::create(["name"=>"Mohsen","password"=> Hash::make("1231"),"email"=>"mohsen@gmail.com"]);
         \App\Models\User::create(["name"=>"Farzad","password"=> Hash::make("32423"),"email"=>"farzad@gmail.com"]);
    }
}
