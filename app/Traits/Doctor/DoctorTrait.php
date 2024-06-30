<?php

namespace App\Traits\Doctor;

use App\Enums\AppointmentStatus;
use App\Models\Appointment;
use App\Models\Auth\Doctor;
use Illuminate\Support\Facades\DB;

/**
 * @mixin Doctor
*/
trait DoctorTrait
{
    public function appointments(): \Illuminate\Database\Eloquent\Builder
    {
        return Appointment::query()->where('doctor_id', $this->id)
                    ->where('status', AppointmentStatus::WAITING->value);
    }
    public function appointmentRequests(): \Illuminate\Database\Eloquent\Builder
    {
        return $this->appointments();
    }
}
