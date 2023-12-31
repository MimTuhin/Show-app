<?php

namespace App\Models;

use App\Models\Color;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

// protected $table=('products');

protected $guarded=[];


public function category()
{
   return $this->belongsTo(Category::class);
}

public function colors()
{
    return $this->belongsToMany(Color::class);
}


}
