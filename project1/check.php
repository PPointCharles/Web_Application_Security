<?php
    session_start();
    $word=$_GET['input'];
    $result=$_SESSION['result'];
    $finish=$_SESSION['finish'];
    $score=$_SESSION['score'];
    if ($finish==null){
        $finish=array();
    }
    if($score==null){
	        $score=0;
	}
    $index1 = array_search($word, $result);
    $index2 = array_search($word, $finish);
	if ( $index1 !== false and  $index2 == false) {
	    
	    $score+=1;
	    $_SESSION['score']= $score;
	    $finish[]=$word;
	    $_SESSION['finish']=$finish;
	   // $result='{"status":"1","score":"'.$score.'","finish":';
	   // echo json_encode($result.json_encode($finish).'}');
	   // echo json_encode($finish);
	}
    echo json_encode($finish);

?>