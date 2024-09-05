<?php

namespace App\Http\Controllers\Relation;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Service;
use Illuminate\Http\Request;

class TestRelation extends Controller
{
    public function onetomany()
    {
        // retrieve hospitol from doctor relation .

        /*  $doctor = Doctor::findOrFail(2) ;
        return $doctor->hospital  ; */


        // retrieve doctor from hospital relation .

        /*  $hospital = Hospital::findOrFail(2);
        return  $hospital->doctors ; */

        # return all the data from relation using with
        // return Hospital::with    ('doctors')->findOrFail(1);  

        #return the hospital of the doctor shams hisham 
        // return Doctor::whereHas('hospital', function ($q) {
        //     $q->where('name', 'shamshisham');
        // });
    }
    public function manytomany()
    {
        // retrieve services from a doctor .
        /*$doctor = Doctor::first() ;
        return $doctor->services ;*/

        // retrieve doctors from a service  
        // $service = Service::first();
        // return $service->doctors;

        // retrieve services with doctor data    
        // return Doctor::with('services')->first() ;

        // retrieve doctors from a certain service 
        $service = Service::first() ; 
    }
}
