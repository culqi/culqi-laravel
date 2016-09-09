<?php

use Illuminate\Database\Seeder;

class CelularSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('celular')->insert([
            'titulo' => 'moto x',
            'descripcion' => 'De google para googleros',
            'precio' => 555,
        ]);

        DB::table('celular')->insert([
            'titulo' => 'Samsung 2341',
            'descripcion' => 'De google para googleros',
            'precio' => 355,
        ]);



    }
}
