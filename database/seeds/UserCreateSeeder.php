<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Role;
use App\User;

class UserCreateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /*  DB::table('users')->insert([
            'name' => 'User1',
            'email' => 'user1@email.com',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->roles()->attach(Role::where('name', 'admin')->first()); */
        
        $user = User::create([
            'name' =>'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        $user->roles()->attach(Role::where('name', 'admin')->first());
    }
}
