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
        DB::table('users')->insert([
            ['name' => 'Alex Verdi', 'email' => 'alex@verdi.it', 'username' => 'tecntecn',
                'password' => Hash::make('takIzAkU'), 'role' => 'tecn','created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Marco Bianchi', 'email' => 'marco@bianchi.it', 'username' => 'staffstaff',
                'password' => Hash::make('takIzAkU'), 'role' => 'staff', 'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'john doe', 'email' => 'john@doe.it', 'username' => 'staffstaff1',
                'password' => Hash::make('takIzAkU'), 'role' => 'staff','created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Mario Rossi', 'email' => 'mario@rossi.it', 'username' => 'adminadmin',
                'password' => Hash::make('takIzAkU'), 'role' => 'admin', 'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")]
        ]);
    }
}
