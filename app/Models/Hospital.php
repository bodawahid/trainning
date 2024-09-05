<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address'];
    protected $hidden = ['created_at', 'updated_at'];
    // one to many relation between hospital and doctors 
    public function doctors()
    {
        return $this->hasMany(Doctor::class, 'hospital_id');
    }
}
