<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weekendmodel extends Model
{
    use HasFactory;
    protected $table = 'weekends';
    protected $guarded  = ['id'];
}
