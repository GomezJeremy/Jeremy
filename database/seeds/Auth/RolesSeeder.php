<?php

use Database\Traits\TruncateTable;
use Database\Traits\DisableForeignKeys;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    use  Database\traits\DisableForeignKeys,  Database\traits\TruncateTable;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('roles');

        $roles = [['name' => 'administrador'], ['name' => 'planta'], ['name' => 'authenticated']];

        DB::table('roles')->insert($roles);

        $this->enableForeignKeys();
    }
}