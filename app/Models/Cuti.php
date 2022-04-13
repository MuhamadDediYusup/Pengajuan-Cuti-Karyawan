<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $table = 'cutis';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_users',
        'tanggal_mulai',
        'tanggal_selesai',
        'jenis_cuti',
        'keterangan',
        'bukti',
        'nip',
    ];

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
