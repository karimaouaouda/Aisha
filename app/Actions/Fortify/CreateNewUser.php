<?php

namespace App\Actions\Fortify;

use App\Enums\AdminRoles;
use App\Enums\AuthRoles;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use PHPUnit\Runner\ParameterDoesNotExistException;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array<string, string> $input
     * @throws ValidationException
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'role' => ['required', "in:". implode(",", AuthRoles::values())],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role' => $input['role'],
        ]);

        $user->save();

        switch ( $input['role'] ){
            case AuthRoles::PATIENT->value:
                $model = new Patient([
                    'user_id' => $user->id
                ]);
                break;
            case AuthRoles::ADMIN->value:
                $model = new Admin([
                   'user_id' => $user->id,
                    'role' => AdminRoles::SUPER->value
                ]);
                break;
            case AuthRoles::DOCTOR->value:
                $model = new Doctor([
                    'user_id' => $user->id,
                    'speciality' => 'generalist'
                ]);
                break;
            default:
                $user->delete();
                throw new ParameterDoesNotExistException($input['role']);
        }

        $model->save();

        return $user;
    }
}
