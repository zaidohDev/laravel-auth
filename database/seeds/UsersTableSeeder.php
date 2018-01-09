<?php

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
        factory(\App\User::class, 1)->states('admin')->create([
            'email'=>'admin@email.com',
            'phone'=>'00000000',
            'cpf'  =>'19337264749'
        ]);

        factory(\App\User::class, 1)->states('user')->create([
            'email'=>'user@email.com'
        ]);
        factory(\App\User::class, 3)->states('user');
    }
}
