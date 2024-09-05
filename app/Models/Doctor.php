<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'age', 'address', 'hospital_id', 'specification'];
    protected $hidden = ['created_at', 'updated_at', 'pivot'];
    // one to many relation between doctors and hospital 
    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospital_id')->withDefault(['']);
    }
    // many to many relation between doctor and services 
    public function services()
    {
        return $this->belongsToMany(Service::class, 'doctor_service')->withPivot(['created_at']);
    }
}
