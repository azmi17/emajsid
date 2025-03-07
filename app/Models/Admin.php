<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    public function laporanKeuangan()
    {
        return $this->hasOne(LaporanKeuangan::class);
    }
}
