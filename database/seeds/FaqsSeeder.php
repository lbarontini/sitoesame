<?php

use Illuminate\Database\Seeder;

class FaqsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faqs_categories')->insert([
            ['name' => 'sito'],
            ['name' => 'prodotti'],
            ['name' => 'centri assistenza'],
        ]);
        DB::table('faqs')->insert([
            ['question' => 'Chi è il creatore del sito?','answer' => 'Lorenzo Barontini', 'faqs_category_id'=> 1,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['question' => 'Come trovo i prodotti?','answer' => 'Click sulla scheda prodotti nella pagina principale','faqs_category_id'=> 2,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['question' => 'Come trovo la scheda prodotti?','answer' => 'Click sull nome del prodotto dalla scheda prodotti','faqs_category_id'=> 2,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
        ]);
    }
}
