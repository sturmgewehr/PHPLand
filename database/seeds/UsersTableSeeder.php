<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Гена Горемыка',
                'email' => 'example@mail.com',
                'password' => bcrypt(Str::random(16)),
            ],
            [
                'name' => 'Гриша Ширшавка',
                'email' => 'example_grisha@mail.com',
                'password' => bcrypt(123123),
            ]
        ];

        DB::table('users')->insert($data);
    }
}
