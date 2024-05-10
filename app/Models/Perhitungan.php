<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perhitungan extends Model
{
    use HasFactory;

    public function rumus()
    {
        return ((Math.sqrt(Math.pow(-7.633458371155025 - -7.634088897474204, 2) + Math.pow(111.54138457462933 - 111.5419429855499, 2))*111.319)*1000);
    }
}
