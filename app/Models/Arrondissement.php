<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arrondissement extends Model
{
    use HasFactory;
    protected $table = 'arrondissement';
    protected $fillable = [ 'id', 'description', 'department_id'];
}
