<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = "roles";

    protected $fillable = ['id', 'role'];
    //protected $hidden = ['id'];

    public function ObtenerRol()
    {
        return Role::where("status","=",1)->paginate(2);
    }

    public function ObtenerRolPorId($id)
    {
        return Role::find($id);
    }
}
