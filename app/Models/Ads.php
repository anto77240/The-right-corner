<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Filters\ProductFilter;

class Ads extends Model
{
    protected $fillable = ['id','title','description','picture','price','location','creator','category_id'];

}
