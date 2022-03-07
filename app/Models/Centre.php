<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centre extends Model
{
    use HasFactory;
    protected $table = 'centre';
    protected $fillable = [ 'id', 'arrondissements', 'communes', 'regions', 'description', 'departments', 'commune_id'];
}
