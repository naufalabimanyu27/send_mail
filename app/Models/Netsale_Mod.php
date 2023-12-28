<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Netsale_Mod extends Model
{
    use HasFactory;
    protected $table = 'v_brand_netsale';
    protected $guarded = ['last_updated'];
}
