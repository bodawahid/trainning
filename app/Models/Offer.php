<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = ['name_ar', 'name_en', 'description_ar', 'description_en', 'price', 'featured_ar', 'featured_en'];
    // protected $hidden = ['id', 'created_at', 'updated_at'];
}
