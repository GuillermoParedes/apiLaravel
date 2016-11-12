<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        factory(\App\User::class, 50)->create()->each(function($user)
        {
            $user->posts()->saveMany(factory(\App\Post::class,100)->make());
        });
        Model::reguard();
    }
}
