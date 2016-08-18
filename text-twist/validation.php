
<?php
    // $value = $_GET['query'];
    session_start();
    $input=$_GET['input'];
    $result=$_SESSION['word'];
    $v=0;
    // echo $input;
    if ($input !=null){
        $in=str_split($input);
        $ir=str_split($result);
        foreach($in as $c){
            $index = array_search($c, $ir);
	        if ( $index !== false ) {
		        unset( $ir[$index] );
	        }
	        else{
	             echo "<span>Invalid</span>";
	             $v=-1;
	             break;
	        }
        }
        if ($v==0){
        echo "<span>Valid</span>";
        }
        // if (array_intersect_assoc($ir,$ia)==$ir ){
        //     echo "<span>Valid</span>";
        // }
        // else{
        //     echo "<span>".$input."</span>";
        // }
    }else{
        echo "<span>Invalid</span>";
    }
?>