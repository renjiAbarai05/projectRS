<?php

use Illuminate\Database\Seeder;
use App\User;

class FactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 1)->create();
        $user = User::first();
        $user->id = '0';
        $user->firstName = '';
        $user->lastName = '';
        $user->username = 'admin';
        $user->email = 'Admin@hotelLaiRico.com'; 
        $user->save();
    }
}
