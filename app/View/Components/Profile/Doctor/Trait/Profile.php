<?php

namespace App\View\Components\Profile\Doctor\Trait;


use App\Models\Auth\Doctor;

trait Profile{

    public function __construct(public Doctor $doctor){

    }
}
