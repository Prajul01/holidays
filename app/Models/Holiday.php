<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use HasFactory;
    protected $table='holidays';
    protected $fillable=['requested_by','vacation_start_date','vacation_end_date','resolved_by','status','leave_taken'];

    public function Employee(){
        return$this->belongsTo(User::class ,'requested_by');
    }

    public function Admin(){
        return$this->belongsTo(User::class ,'resolved_by');
    }
}
