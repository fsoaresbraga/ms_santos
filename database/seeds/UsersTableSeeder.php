<?php

use Illuminate\Database\Seeder;
use App\Models\Api\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'      => 'Daniel Wallace',
                'email'     => 'daniel@gmail.com',
                'password'  => bcrypt('147258'),
            ],
            [
                'name'      => 'Felipe Soares',
                'email'     => 'felipe@gmail.com',
                'password'  => bcrypt('123456'),
            ]
        ];

        User::insert($users);
    }
}
