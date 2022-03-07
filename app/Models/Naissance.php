<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Naissance extends Model
{
    use HasFactory;
    protected $table = 'communes';
    protected $fillable = [ 'id', 'values'];
}
