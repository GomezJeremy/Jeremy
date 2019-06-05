<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon as Carbon;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([ 
            
            'nombre' => 'cera',
            'precioUnitario' => 5000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        
    ]);

    DB::table('products')->insert([ 
            
        'nombre' => 'lamina',
        'precioUnitario' => 98,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    
]);

DB::table('products')->insert([ 
            
    'nombre' => 'lamina',
    'precioUnitario' => 98,
    'created_at' => Carbon::now(),
    'updated_at' => Carbon::now(),

]);

DB::table('products')->insert([ 
            
    'nombre' => 'cera',
    'precioUnitario' => 10000,
    'created_at' => Carbon::now(),
    'updated_at' => Carbon::now(),

]);

DB::table('products')->insert([ 
            
    'nombre' => 'cera',
    'precioUnitario' => 5000,
    'created_at' => Carbon::now(),
    'updated_at' => Carbon::now(),

]);

    }
}
