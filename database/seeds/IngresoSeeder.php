<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;

class IngresoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
          //

          DB::table('ingreso')->insert([ 
            
            'idproveedor' => 9990,
            'idusuario' => 4,
            'tipo_comprobante' => 'Boleta',
            'serie_comprobante' => 145,
            'total_venta' => 12000,
            'fecha_hora' => Carbon::yesterday(),
            'estado' => 'Activo',
            'created_at' => Carbon::yesterday(),
            'updated_at' => Carbon::yesterday(),
        
    ]);

    DB::table('ingreso')->insert([ 
        
        'idproveedor' => 3,
        'idusuario' => 4,
        'tipo_comprobante' => 'Boleta',
        'serie_comprobante' => 234,
        'total_venta' => 15000,
        'fecha_hora' => Carbon::now(),
        'estado' => 'Activo',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    
]);
DB::table('ingreso')->insert([ 
        
    'idproveedor' => 87,
            'idusuario' => 4,
            'tipo_comprobante' => 'Boleta',
            'serie_comprobante' => 567,
            'total_venta' => 8000,
            'fecha_hora' => Carbon::now(),
            'estado' => 'Activo',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

]);
    }
}
