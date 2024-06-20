<?php

namespace App\Policies;

use App\Enums\RequestStatus;
use App\Models\Auth\Doctor;
use App\Models\Auth\Patient;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Access\Response;

class MedicalRequestPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {

    }

    public function send(Patient $patient, Doctor $doctor): Response
    {

        $d = DB::table('medical_following_requests')
                    ->where('patient_id' , '=', $patient->id)
                    ->where('doctor_id', '=', $doctor->id)
                    ->get();

        if( $d->isEmpty() ){
            return Response::allow();
        }

        $record = $d->first();
        switch( $record->status ){

            case RequestStatus::ACCEPTED->value:
                return Response::deny('you ae already follow at this doctor');

            case RequestStatus::WAITING->value:
                return Response::deny('you sent a request to this doctor');

            case RequestStatus::REJECTED->value:

                $diff = (int) now()->diffInDays($record->created_at);

                return Response::deny('you must wait ' . (15 - $diff) . ' days to retry request'  );

            default:
                return Response::deny('unknown problem happen please contact us');
        }
    }

}
