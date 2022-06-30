<?php

use Illuminate\Database\Seeder;
use App\Historic;

class HistoricsTableSeeder extends Seeder
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
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'last_login_at'     => NULL,
                'last_login_ip'     => NULL,
            ],
        ];

       Historic::insert($users);
    }
}
