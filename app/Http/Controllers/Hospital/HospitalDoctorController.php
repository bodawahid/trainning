<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Hospital;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;

class HospitalDoctorController extends Controller
{
    public function hospitals()
    {
        $hospitals = Hospital::all();
        return view('doctors.hospitals', compact('hospitals'));
    }
    public function doctors(Hospital $hospital)
    {
        $doctors = $hospital->doctors;
        return view('doctors.doctors', compact('doctors'));
    }
    public function services(Doctor $doctor)
    {
        $services = $doctor->services;
        return view('doctors.services', compact('services'));
    }
    // return hospitals that have only doctors .
    public function hasDoctors()
    {
        return Hospital::whereHas('doctors')->get();
    }

    // return hospitals that have doctors and  has at least one male doctor. 
    public function hasMaleDoctors()
    {
        return Hospital::with('doctors')->whereHas('doctors', function ($q) {
            $q->where('gender', 'male');
        })->get();
    }
    public function DoesnotHaveDoctors()
    {
        return Hospital::whereDoesntHave('doctors')->get();
    }
}
