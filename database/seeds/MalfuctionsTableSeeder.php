<?php

use Illuminate\Database\Seeder;

class MalfuctionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('malfunctions')->insert([
            ['product_id' => '1','name' => 'Spento','description'=>'Il dispositivo non dà segni di vita','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['product_id' => '3','name' => 'Perde acqua','description'=>'Il dispositivo perde acqua','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['product_id' => '2','name' => 'Danneggiamento generico','description'=>'Il dispositivo presenta evidenti danneggiamenti','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['product_id' => '4','name' => 'Cardini danneggiati','description'=>'I cardini dello sportello del dispositivo sono danneggiati','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")]
        ]);
        DB::table('solutions')->insert([
            ['malfunction_id' => '1','name' => 'Alimentazione','description'=>'Controllare il circuito di alimentazione','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['malfunction_id' => '3','name' => 'Fusibili','description'=>'Controllare la presenza di fusibili fusi','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['malfunction_id' => '2','name' => 'Serraggio giunzioni','description'=>'Controllare il serraggio delle giunzioni','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['malfunction_id' => '4','name' => 'Sostituzione','description'=>'Non Riparare','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            ['malfunction_id' => '4','name' => 'Sostituzione sportello','description'=>'Sostituire lo sportello','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")]
        ]);
    }
}
