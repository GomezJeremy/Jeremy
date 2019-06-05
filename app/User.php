<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\MailResetPasswordToken;

class User extends Authenticatable
{
    use Notifiable;


    const STATUS = 1;
    const INACTIVE = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password' , 'status', 'activation_code',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles', 'user_id', 'role_id');
    }

    public function assignRole(Role $role)
{
    return $this->roles()->save($role);
}

//para las rutas
public function isAdmin()
{
    foreach ($this->roles()->get() as $role)
    {
        if ($role->name == 'administrador')
        {
            return true;
        }
    }

   
}

public function isPlanta()
{
    foreach ($this->roles()->get() as $role)
    {
        if ($role->name == 'Planta')
        {
            return true;
        }
    }
}

public function isAutenticado()
{
    foreach ($this->roles()->get() as $role)
    {
        if ($role->name == 'authenticated')
        {
            return true;
        }
    }
}
public function hasRole(string $roleSlug)
{


     $roles = $roleSlug;
     $rolesArray = explode(';',$roles);  
     $roles = $this->roles()->whereIn('name', $rolesArray)->count() > 0;
     return $roles;

}

//PARA EL FILTRO DE LAS TABLAS
    //Query Scope
    public function scopeName($query, $name)
    {
        if($name)
            return $query->where('name', 'LIKE', "%$name%");
    }
    public function scopeEmail($query, $email)
    {
        if($email)
            return $query->where('email', 'LIKE', "%$email%");
    }

    public function scopeBuscar($query,$name)
		{
		  if (trim($name) !="")
		  {
		    $query->where(\DB::raw("CONCAT(name,' ',email)"),"LIKE","%$name%");
		  }

        }
        
        public function sendPasswordResetNotification($token)
{
    $this->notify(new MailResetPasswordToken($token));
}
}