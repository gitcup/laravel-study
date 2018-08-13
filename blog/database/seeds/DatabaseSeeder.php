<?php

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
        // $this->call(UsersTableSeeder::class);
        $user =new \App\User();
        $user->username = 'gitcup';
        $user->name = 'Krit Pattanpanich';
        $user->lastname = 'Pattanpanich';
        $user->email = 'gitcupandg@gmai.com';
        $user->image_user = '';
        $user->phone_number = '039328317';
        $user->password = Hash::make('123456');
        $user->save();
    }
}
