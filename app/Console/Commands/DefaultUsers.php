<?php

namespace App\Console\Commands;

use App\Enums\AdminRoles;
use App\Enums\AuthRoles;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use http\Exception\BadMethodCallException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class DefaultUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:default-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create default users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $defaultPassword = "cpplang24";

        $this->withProgressBar(3, function() use ( $defaultPassword ){
            $this->newLine();
            $this->createUser(
                "karim aouaouda",
                "karimkimakimo",
                $defaultPassword,
                AuthRoles::PATIENT,
            );
            $this->newLine();

            $this->createUser(
                "daya daya",
                "dayadaya",
                $defaultPassword,
                AuthRoles::DOCTOR,
                [
                    "speciality" => "generalist"
                ]
            );
            $this->newLine();

            $this->createUser(
                "halimi khaled",
                "halimi",
                $defaultPassword,
                AuthRoles::ADMIN,
                [
                    "role" => AdminRoles::SUPER->value
                ]
            );
            $this->newLine();

        });
        $this->newLine();
        $this->info("users created");
        $this->newLine();
    }

    private function createUser(string $name, string $emailUsername, string $password, AuthRoles $role, array $options = [] ): void
    {
        $user = new User([
            'name' => $name,
            'email' => "{$emailUsername}@gmail.com",
            'password' => Hash::make($password),
            'role' => $role->value
        ]);

        $user->save();

        switch($role->value){
            case AuthRoles::DOCTOR->value:
                $doctor = new Doctor(array_merge([
                    'user_id' => $user->id,
                ], $options));

                $doctor->save();
                break;
            case AuthRoles::ADMIN->value:
                $admin = new Admin(array_merge([
                    'user_id' => $user->id,
                ], $options));

                $admin->save();
                break;
            case AuthRoles::PATIENT->value:
                $patient = new Patient(array_merge([
                    'user_id' => $user->id,
                ], $options));

                $patient->save();
                break;
            default:
                throw new BadMethodCallException("bad method call");

        }

        $this->info("user({$role->value}) created with email:{$user->email} and password:{$password}");
    }
}
