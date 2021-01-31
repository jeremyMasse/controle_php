<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\livre;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "Jeremy";
        $user->email = "jeremy.masse@ynov.com";
        $user->password = bcrypt("test1234");
        $user->save();

        livre::create([
            'titre' => 'harry potter 1',
            'auteur' => 'J.K Rowling',
            'prix' => 15,
            'note' => 3,
            ]);

        livre::create([
            'titre' => 'harry potter 2',
            'auteur' => 'J.K Rowling',
            'prix' => 15,
            'note' => 2,
            ]);
        livre::create([
            'titre' => 'harry potter 3',
            'auteur' => 'J.K Rowling',
            'prix' => 20,
            'note' => 4,
            ]);
        
        livre::create([
            'titre' => 'harry potter 4',
            'auteur' => 'J.K Rowling',
            'prix' => 25,
            'note' => 5,
            ]);

    }
}
