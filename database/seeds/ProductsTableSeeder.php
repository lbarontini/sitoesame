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

        DB::table('malfunction_product')->insert([
            ['malfunction_id' =>'1', 'product_id'=>'1','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['malfunction_id' =>'1', 'product_id'=>'2','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['malfunction_id' =>'2', 'product_id'=>'3','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['malfunction_id' =>'2', 'product_id'=>'4','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['malfunction_id' =>'3', 'product_id'=>'1','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['malfunction_id' =>'3', 'product_id'=>'5','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['malfunction_id' =>'4', 'product_id'=>'1','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['malfunction_id' =>'4', 'product_id'=>'2','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['malfunction_id' =>'4', 'product_id'=>'5','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")]
        ]);
    }
}
