<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('products')->insert([
            ['name' => 'NetBook Modello2','description' => 'Caratteristiche NetBook2',
             'installation_notes' =>$faker->paragraph(3), 'use_notes' =>$faker->paragraph(2),
             'user_id' => 0, 'image' => 'articleimage.jpg'],
        ]);
    }
}
