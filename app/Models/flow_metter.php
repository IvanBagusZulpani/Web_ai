<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class flow_metter extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika berbeda dari 'flow_meters'
    protected $table = 'flow_meter';

    // Menentukan primary key yang bukan 'id'
    protected $primaryKey = 'ID';

    // Mematikan timestamps karena kita sudah punya kolom 'timestamp' sendiri
    public $timestamps = false;

    // Mengizinkan mass assignment untuk kolom-kolom ini
    protected $fillable = [
        'flow_rate',
        'volume',
        'timestamp',
    ];

   
}
