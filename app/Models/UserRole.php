<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $table = 'user_roles';
    protected $primaryKey = 'id';
    protected $fillable = ['id_users', 'role_name', 'role_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_users');
    }
}
