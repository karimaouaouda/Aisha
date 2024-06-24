<?php

namespace App\Traits\Patient;

use App\Enums\RequestStatus;
use App\Models\Auth\Doctor;
use App\Models\Auth\Patient;
use Illuminate\Support\Facades\DB;

/**
 * @mixin Patient
*/
trait CanMedicalFollow
{
    public function isMedicalFollow(Doctor $doc): bool
    {
        return $this->doctors()->where('doctor_id', $doc->id)->count() > 0;
    }

    public function isMedicalRequestSent(Doctor $doc) : bool
    {
        return DB::table('medical_following_requests')
                    ->where('patient_id', $this->id)
                    ->where('doctor_id', $doc->id)
                    ->where('status', RequestStatus::WAITING)
                    ->count() > 0;
    }

    public function medicalFollow(Doctor $doc, string $note){
        try{
            DB::table('medical_following_requests')
                ->insert([
                    'patient_id' => $this->id,
                    'doctor_id' => $doc->id,
                    'request_note' => $note,
                    'status' => RequestStatus::WAITING->value,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);

            return response()->json([
                'status' => 'success',
                'message' => "followed successfully"
            ]);

        }catch (\Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ], 400);
        }
    }

}
