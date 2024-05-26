<?php

namespace Database\Factories;

use App\Enums\AuthRoles;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::where('role', '=', AuthRoles::DOCTOR->value)->get();
        
        return [
            //
        ];
    }
}
