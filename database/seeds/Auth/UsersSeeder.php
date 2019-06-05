<?php


use Illuminate\Support\Str;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
   

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('users')->insert([ 
            
                'name' => 'Juana',
                'email' => 'Juana.hotmail@gmail.com',
                'password' => bcrypt('admin'),
                'active' => true,
                'confirmation_code' => \Ramsey\Uuid\Uuid::uuid4(),
                'confirmed' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            
        ]);

        DB::table('users')->insert([ 
            
            'name' => 'Jose',
            'email' => 'Jose.hotmail@gmail.com',
            'password' => bcrypt('admin'),
            'active' => true,
            'confirmation_code' => \Ramsey\Uuid\Uuid::uuid4(),
            'confirmed' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        
    ]);

       
    }
}
