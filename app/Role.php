<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasPermissions;


class Role extends Model
{

    use HasPermissions;
    protected $table= 'roles';
    protected $primaryKey="id";
    public $timestamps=true;

    protected $fillable =[
        'name'

    ];

    public function usuarios()
    {
        return $this->belongsToMany(User::class,'users_roles', 'user_id', 'role_id');
    }
}
