<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
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
        User::create([ 
            'name' => 'Brian Aguero',
            'email' => 'aguerodev@mail.com',
            'password' => bcrypt('123456')
        ]);
        
        Post::factory(30)->create();  

        
    }
}
