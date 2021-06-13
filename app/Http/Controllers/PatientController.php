<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Staff;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function getPatient(Request $request){
        return Patient::all();
    }


    public function findPatient(Request $request, $pat_id){
        if(Patient::find($pat_id) === null){
            return Response('Patient not found', 404);
        }
        if($request->user()->role === 'admin' ){
            return Patient::find($pat_id);
        }
        else return Response('Access Forbidden', 403);

    }


    public function updatePatient(Request $request, $pat_id){
        if(Patient::find($pat_id) === null){
            return Response('Patient not found', 404);
        }
        if($request->user()->role === 'admin' ){
            return Patient::find($pat_id)->update($request->all());
        }
        else return Response('Access Forbidden', 403);

    }

    public function addPatient(Request $request){
        if($request->user()->role === 'admin'  ){
            return Patient::create($request->all());
        }

        else return Response('Access Forbidden', 403);
    }


    public function deletePatient(Request $request, $pat_id)
    {
        if (Patient::find($pat_id) === null) {
            return Response('Patient not found', 404);
        }
        if($request->user()->role === 'admin' ){
            return Patient::find($pat_id);
        }
        else return Response('Access Forbidden', 403);

    }

}
