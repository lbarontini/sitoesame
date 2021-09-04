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
        DB::table('roles')->insert([
            ['name' => 'admin', 'label' => 'Amministratore'],
            ['name' => 'staff', 'label' => 'Staff'],
            ['name' => 'tecn', 'label' => 'Tecnico'],
            ['name' => 'guest', 'label' => 'Ospite'],
        ]);
        DB::table('users')->insert([
            ['name' => 'Alex Verdi', 'email' => 'alex@verdi.it', 'username' => 'tecntecn',
                'password' => Hash::make('takIzAkU'), 'role_id' => '3','created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Marco Bianchi', 'email' => 'marco@bianchi.it', 'username' => 'staffstaff',
                'password' => Hash::make('takIzAkU'), 'role_id' => '2', 'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'john doe', 'email' => 'john@doe.it', 'username' => 'staffstaff1',
                'password' => Hash::make('takIzAkU'), 'role_id' => '2','created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Mario Rossi', 'email' => 'mario@rossi.it', 'username' => 'adminadmin',
                'password' => Hash::make('takIzAkU'), 'role_id' => '1', 'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")]
        ]);
    }
}
