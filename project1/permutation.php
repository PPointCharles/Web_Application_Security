<?php
    // $word=['A','B','C','D'];
    // $word='abcd';
    $result=[];
    function permutation($word,$l,$r){
        if ($l==$r){
            array_push($GLOBALS['result'],$word);
            // echo print_r($result).';\n';
        }
        else{
            $i=$l;
            for(;$i<$r;$i++){
                  $word=swap($word,$i,$l);
                  permutation($word,$l+1,$r);
                  $word=swap($word,$i,$l);
            }
        }
        // print_r($result);
        // return $result;
    }
    function swap($s,$l,$r){

        $t=$s[$l];
        $s[$l]=$s[$r];
        $s[$r]=$t;
        return $s;
    }
    // $result=[];
    // $result1=permutation($word,0,4);
    // echo print_r($result1);
?>