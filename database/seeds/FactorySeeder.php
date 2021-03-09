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
        factory(User::class, 2)->create();
        $user = User::first();
        $user->name = 'Admin';
        $user->email = 'Admin@hotelLaiRico.com'; 
        $user->save();
    }
}
