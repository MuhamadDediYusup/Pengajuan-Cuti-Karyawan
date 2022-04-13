<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RejectionStatement extends Model
{
    use HasFactory;

    protected $table = 'rejection_statements';
    protected $primaryKey = 'id';
    protected $fillable = ['id_cuti', 'description'];

    public function cuti()
    {
        return $this->belongsTo('App\Models\Cuti', 'id_cuti');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_users');
    }
}
