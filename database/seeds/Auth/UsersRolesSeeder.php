<?php

use Illuminate\Support\Str;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersRolesSeeder extends Seeder
{
   
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 

        $data = [
            'Juana.hotmail@gmail.com' => ['administrador', 'authenticated'],
            'Jose.hotmail@gmail.com' => ['authenticated'],
           
        ];

        foreach ($data as $email => $role) {
            /** @var  $user \App\Models\Auth\User\User */
            $user = \App\User::whereEmail($email)->first();

            if (!$user) continue;

            $role = !is_array($role) ? [$role] : $role;

            $roles = \App\Role::whereIn('name', $role)->get();

            $user->roles()->attach($roles);
        }

    }
}
