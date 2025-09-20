<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meteran extends Model
{
    use HasFactory;
     protected $table = 'meteran';

    // Primary key
    protected $primaryKey = 'id';

    // Kolom yang bisa mass-assignment
    protected $fillable = [
        'device_id',
        'reading_value',
        //'image_path',
    ];
}
