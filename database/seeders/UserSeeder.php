<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=User::create([
            'email' =>'admin@gmail.com',
            'password' =>Hash::make('test12345'),
            'name' =>'admin',
            
    
]); 
    $admin->attachRole('admin');

    $user=User::create([
        'email' =>'user@gmail.com',
        'password' =>Hash::make('test12345'),
        'name' =>'user',
        

]); 
$user->attachRole('user');
$user1=User::create([
    'email' =>'user1@gmail.com',
    'password' =>Hash::make('test12345'),
    'name' =>'user1',
    

]); 
$user1->attachRole('user');
        }
}
