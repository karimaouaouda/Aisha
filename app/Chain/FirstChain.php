<?php

namespace App\Chain;

use Closure;

class FirstChain{



    public function handle($pass, Closure $next){
        $pass = $pass . " hi" ;
        return $next($pass);
    }
}