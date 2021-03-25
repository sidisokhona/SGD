<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disc extends Model
{
    use HasFactory;

    function rays(){
        return $this->belongsTo(Ray::class);
    }

    function authors(){
        return $this->belongsTo(Author::class);
    }

    function disc_types(){
        return $this->belongsTo(DiscType::class);
    }

    protected $fillable = ['name','ray_id','discType_id','author_id','price','rayQuantity','stockQuantity'];
}
