<?php

namespace App\Http\Controllers\Medical;

use App\Enums\RequestStatus;
use App\Http\Controllers\Controller;
use App\Models\Auth\Doctor;
use App\Models\Auth\Patient;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class FollowingController extends Controller
{

    public function sendFollowRequest(Doctor $doctor) : mixed
    {
        $patient = auth('patient')->user();

        $authorize = Gate::inspect('send-request', $doctor);

        if( !$authorize->allowed() ){
            return response()->json([
                'status' => 'failed',
                'message' => $authorize->message()
            ], 200);
        }

        return $patient->medicalFollow($doctor);
    }

    public function acceptRequest(Patient $patient): JsonResponse
    {

        DB::transaction(function() use ($patient){
            DB::table('medical_following_requests')
                ->where('patient_id', '=', $patient->id)
                ->where('doctor_id','=',  auth('doctor')->id())
                ->update([
                    'status' => RequestStatus::ACCEPTED->value,
                    'updated_at' => now()
                ]);

            DB::table('medical_followings')
                    ->insert([
                        'doctor_id' => auth('doctor')->id(),
                        'patient_id' => $patient->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
        }, 2);

        return response()->json([
            'status' => 'success',
            'message' => 'ou all set'
        ]);

    }

    public function rejectRequest(Patient $patient, Request $request): JsonResponse
    {

        DB::table('medical_following_requests')
            ->where('patient_id', '=', $patient->id)
            ->where('doctor_id','=',  auth('doctor')->id())
            ->update([
                'status' => RequestStatus::REJECTED->value,
                'reject_reason' => $request->has('reason') ? $request->input('reason') : 'no reason',
                'updated_at' => now()
            ]);

        return response()->json([
            'status' => 'success',
            'message' => 'you all set'
        ]);

    }


}
