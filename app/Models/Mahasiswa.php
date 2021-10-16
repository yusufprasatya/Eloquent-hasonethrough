<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    public function nilai()
    {
        return $this->hasOne('App\Models\Nilai');

    }

    public function rapor()
    {
        /**
         * Fore getting data from third table we need to set the relationship for those table.
         * Data from third table can be accesed form first table.
         */
        return $this->hasOneThrough('App\Models\Rapor','App\Models\Nilai');
        
    }
}
