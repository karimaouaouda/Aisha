<?php

namespace Database\Seeders;

use App\Enums\AuthRoles;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Database\Factories\UserFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $doctors = [];

        $patients = [];
        for ($i = 0; $i < 10; $i++) {
            $user = User::create([
                'name' => fake()->name('male'),
                'email' => fake()->email(),
                'password' => 'password123',
                'role' => AuthRoles::DOCTOR->value
            ]);

            $user->save();

            $doctor = Doctor::create([
                'user_id' => $user->id,
                'speciality' => 'generalist'
            ]);

            $doctor->save();

            $doctors[] = $doctor;
        }


        for ($i = 0; $i < 10; $i++) {

            $user = User::create([
                'name' => fake()->name('male'),
                'email' => fake()->email(),
                'password' => 'password123',
                'role' => AuthRoles::DOCTOR->value
            ]);

            $user->save();

            $patient = Patient::create([
                'user_id' => $user->id,

            ]);

            $patient->save();

            $patients[] = $patient;
        }


        foreach($doctors as $doctor){

            Appointment::create([
                'doctor_id' => $doctor->user_id,
                'patient_id' => $patients[rand(0, 9)]->user_id,
                'time' => now()->addDays(rand(1, 5)),
                'requester' => ['patient', 'doctor'][rand(0, 1)]
            ]);

        }

        
    }
}
