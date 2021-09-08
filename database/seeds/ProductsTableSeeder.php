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
            ['model' => 'Mic1','description' => 'Microonde 1',
             'installation_notes' =>$faker->paragraph(3), 'use_notes' =>$faker->paragraph(2),
             'image' => 'microonde.jpg', 'user_id'=>null],
            ['model' => 'Ow1','description' => 'Forno 1',
            'installation_notes' =>$faker->paragraph(3), 'use_notes' =>$faker->paragraph(2),
            'image' => 'forno.jpg', 'user_id'=>null],
            ['model' => 'Tap1','description' => 'Rubinetto 1',
            'installation_notes' =>$faker->paragraph(3), 'use_notes' =>$faker->paragraph(2),
            'image' => 'rubinetto1.jpg', 'user_id'=>null],
            ['model' => 'Tap2','description' => 'Rubinetto 2',
            'installation_notes' =>$faker->paragraph(3), 'use_notes' =>$faker->paragraph(2),
            'image' => 'rubinetto2.jpg', 'user_id'=>null],
            ['model' => 'Wm1','description' => 'Lavatrice 1',
            'installation_notes' =>$faker->paragraph(3), 'use_notes' =>$faker->paragraph(2),
            'image' => 'lavatrice.jpg', 'user_id'=>null],
        ]);
    }
}
