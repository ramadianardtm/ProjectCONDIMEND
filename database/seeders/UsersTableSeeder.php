<?php

namespace Database\Seeders;

use App\Models\RegParkir;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Ramadian Arditama';
        $user->email = 'user@ymail.com';
        $user->password = bcrypt('tokemtokem');
        $user->role = 'member';
        $user->save();

        $user = new User();
        $user->name = 'Pengelola A';
        $user->email = 'pengelola@ymail.com';
        $user->password = bcrypt('tokemtokem');
        $user->role = 'pengelola';
        $user->save();
    }
}
