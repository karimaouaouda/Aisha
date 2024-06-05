<?php

namespace App\Console\Commands;

use App\Models\Auth\Admin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AdminCreator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to create an admin with a specific role';

    /**
     * Execute the console command.
     * @throws ValidationException
     */
    public function handle()
    {
        $name = $this->ask('what is the admin name ?');

        $email = $this->ask('what is the admin email ( you will be asked to verify it ) ?');

        $password = $this->ask('what is the password for this admin ?', 'chatpy24');

        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $password
        ];

        $rules = [
            'name' => ['required', 'min:10', 'max:100'],
            'email' => ['required', 'email', 'unique:admins,email'],
            'password' => ['required', 'min:8', 'max:15']
        ];

        $validation = Validator::make($data, $rules);

        if( $validation->valid() ){
            $data['password'] = Hash::make($data['password']);

            $admin = new Admin($data);

            $admin->save();
        }else{
            throw new ValidationException($validation);
        }

    }
}
