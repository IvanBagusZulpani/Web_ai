<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlowMetter extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'flow_metter';

    // Primary key
    protected $primaryKey = 'id';

    // Kolom yang bisa mass-assignment
    protected $fillable = [
        'device_id',
        'flow_rate',
        'volume',
    ];
}
