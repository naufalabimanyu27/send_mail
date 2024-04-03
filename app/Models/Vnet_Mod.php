<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vnet_Mod extends Model
{
    use HasFactory;
    protected $table = 'v_net';
    protected $guarded = ['last_updated'];
}
