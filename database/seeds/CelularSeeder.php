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
            'titulo' => 'G5 SE',
            'descripcion' => 'Dale un aire de frescura a tu comunicación con un smartphone de grandes cualidades.',
            'precio' => 655,
        ]);

        DB::table('celular')->insert([
            'titulo' => 'Galaxy A7',
            'descripcion' => 'Samsung se reinventa para dar más poder a tu comunicación con el nuevo Samsung Galaxy A7.',
            'precio' => 599,
        ]);

        DB::table('celular')->insert([
            'titulo' => 'Xperia Z5',
            'descripcion' => 'Si siempre buscas mejorar la calidad de tus selfies, con la ayuda del Xperia Z5 lo podrás conseguir.',
            'precio' => 399,
        ]);


    }
}
