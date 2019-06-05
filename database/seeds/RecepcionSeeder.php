<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon as Carbon;
use Illuminate\Support\Facades\DB;

class RecepcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('recepcion_materia_primas')->insert([ 
            
            'fecha' => Carbon::yesterday(),
            'pesoBruto' => 500,
            'pesoNeto' => 250,
            'numero_muestras' => 4,
            'afiliado_id' => 87,
            'user_id' => 2,
            'tipoEntrega_id' => 1,
            'observacion'  => 'Buen estado',
            'created_at' => Carbon::yesterday(),
            'updated_at' => Carbon::yesterday(),
        
    ]);

    DB::table('recepcion_materia_primas')->insert([ 
        
            'fecha' => Carbon::now(),
            'pesoBruto' => 500,
            'pesoNeto' => 250,
            'numero_muestras' => 5,
            'afiliado_id' => '3',
            'user_id' => 2,
            'tipoEntrega_id' => 1,
            'observacion'  => 'Buen estado',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
    
]);
DB::table('recepcion_materia_primas')->insert([ 
        
    'fecha' => Carbon::now(),
    'pesoBruto' => 800,
    'pesoNeto' => 400,
    'numero_muestras' => 6,
    'afiliado_id' => '543217',
    'user_id' => 2,
    'tipoEntrega_id' => 1,
    'observacion'  => 'Buen estado',
    'created_at' => Carbon::now(),
    'updated_at' => Carbon::now(),

]);
    }
}
