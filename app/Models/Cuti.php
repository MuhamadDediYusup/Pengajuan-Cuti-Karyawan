<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $table = 'cuti';
    protected $primaryKey = 'id';
    protected $fillable = ['id_users', 'cuti_type', 'cuti_start', 'cuti_end', 'cuti_total', 'cuti_remaining', 'cuti_status'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_users');
    }

    public function approval_manager()
    {
        return $this->belongsTo('App\Models\ApprovalManager', 'id_approval_manager');
    }

    public function approval_senior_manager()
    {
        return $this->belongsTo('App\Models\ApprovalSeniorManager', 'id_approval_senior_manager');
    }

    public function rejection_statement()
    {
        return $this->hasMany('App\Models\RejectionStatement', 'id_cuti');
    }

    public function user_role()
    {
        return $this->hasOne('App\Models\UserRole', 'id_users');
    }
}
