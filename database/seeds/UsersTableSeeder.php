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
            ['name' => 'admin', 'label' => 'Amministratore','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'staff', 'label' => 'Staff','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'tecn', 'label' => 'Tecnico','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'guest', 'label' => 'Ospite','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
        ]);
        $faker = Faker\Factory::create();
        DB::table('assistance_centers')->insert([
            ['name' => 'InfoTecna', 'address' =>$faker->address(),'description'=>$faker->paragraph(2),'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'RepairOmatic', 'address' => $faker->address(),'description'=>$faker->paragraph(2),'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'CenterAssist', 'address' => $faker->address(),'description'=>$faker->paragraph(2),'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
        ]);

        DB::table('users')->insert([
            ['name' => 'Alex Verdi', 'email' => 'alex@verdi.it', 'username' => 'tecntecn',
                'password' => Hash::make('takIzAkU'), 'role_id' => '3','assistance_center_id'=>1,
                'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Marco Bianchi', 'email' => 'marco@bianchi.it', 'username' => 'staffstaff',
                'password' => Hash::make('takIzAkU'), 'role_id' => '2','assistance_center_id'=>null,
                'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'john doe', 'email' => 'john@doe.it', 'username' => 'staffstaff1',
                'password' => Hash::make('takIzAkU'), 'role_id' => '2','assistance_center_id'=>null,
                'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Mario Rossi', 'email' => 'mario@rossi.it', 'username' => 'adminadmin',
                'password' => Hash::make('takIzAkU'), 'role_id' => '1','assistance_center_id'=>null,
                'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Joe Strummer', 'email' => 'joe@strummer.uk', 'username' => 'guestguest',
                'password' => Hash::make('takIzAkU'), 'role_id' => '4','assistance_center_id'=>null,
                'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
        ]);
    }
}
