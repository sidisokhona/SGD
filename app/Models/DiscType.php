<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscType extends Model
{
    use HasFactory;

    function discs(){
        return $this->hasMany(Disc::class);
      }
      protected $fillable = ['name'];
}
