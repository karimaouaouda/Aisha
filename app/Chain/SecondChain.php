<?php

namespace App\Chain;

use Closure;

class SecondChain{



    public function handle($pass, Closure $next){
        $pass = $pass . " hi" ;
        return $next($pass);
    }
}