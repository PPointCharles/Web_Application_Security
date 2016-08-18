<?php
    // $username='admin';
    // $salt = openssl_random_pseudo_bytes(40, $was_strong);
    // $pwd ='cookies';
    // $r=2000;
    // $x='0';
    // $init = microtime(true);
    
    // $total = microtime(true) - $init;
    // echo $x.'<br>';
    // echo $username.'<br>'.$pwd.'<br>'.bin2hex($salt).'<br>'.$r.'<br>'.$x;
    // echo '<br>';
    // echo $total.' s';
    // hash_m3($pwd,$salt,$r);
    function hash_m1($pwd,$salt,$r){
        $x='0';
        $x=hash('sha256', $x.$pwd.$salt);

        for(;$r>1;$r-=1){
            
            $x=hash('sha256', strtoupper($x).$pwd.$salt);
            // echo $x.'<br>';
        }
        return ($x);
    }
    
    function hash_m2($pwd,$salt,$r){
        $x='0';
        $x=hash('sha256', $x.$pwd.$salt);

        for(;$r>1;$r-=1){
            
            $x=hash('sha256', $x.$pwd.$salt);
            // echo $x.'<br>';
        }
        return ($x);
    }
    
    function hash_m3($pwd,$salt,$r){
        $x='0';
        $x=hash('sha256', $x.$pwd.$salt);
        echo $x.'<br>';
        for(;$r>1;$r-=1){
            
            $x=hash('sha256', hex2bin($x).$pwd.$salt);
            echo $x.'<br>';
        }
        return ($x);
    }
   ?>
   <!--INSERT INTO auth ('username','secure_pwd','salt','stretch') VALUES('admin','5dcba441b9ca7bc780f211351d68a3f51b746749cba8385a010c529bcd976b4d','†GÜÆf·¶+yª“”®î£q®×Ã/¿Ñ›!ê4Bà]¡‹w/ñeŸ','2000')-->