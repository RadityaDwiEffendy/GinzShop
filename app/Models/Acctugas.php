<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acctugas extends Model
{
    use HasFactory;

    protected $fillable = ['picker', 'title', 'description', 'reward', 'kasir_job', 'kurir_job'];
}
