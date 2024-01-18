<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SQ_NotApproved_Mod extends Model
{
    use HasFactory;
    protected $table = 'v_sq_notapproved';
    protected $guarded = ['last_updated'];
}
