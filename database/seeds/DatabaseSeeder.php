<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(User::where('email','=','admin@mail.com')->count()){
            $user = User::where('email','=','admin@mail.com')->first();
        }else{
            $user = new User;
        }
        $user->name = "Admin";
        $user->email = "admin@mail.com";
        $user->password = bcrypt("123456");
        $user->save();
    }
}
