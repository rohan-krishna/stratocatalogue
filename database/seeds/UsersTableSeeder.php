<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $me = User::create([
            'email' => 'rohan.krishna@stratforge.com', 
            'name' => 'Rohan Krishna', 
            'password' => bcrypt('Harry30993')
        ]);
    }
}
