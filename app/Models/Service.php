<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    protected $hidden = ['pivot'];
    public $timestamps = true;
    // many to many relation between services and doctors 
    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'doctor_service')->withPivot(['created_at']);
    }
}
