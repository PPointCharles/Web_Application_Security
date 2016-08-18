<?php
    include 'text_twist.php';
    session_start();
    $op=$_GET['op'];
    
    if ($op=="1"){
        $word=generate_rack(7);
        echo $word;
        $_SESSION["word"] = $word;
        $result=Text_Twist_db($_SESSION["word"]);
        // print_r($result);
        $_SESSION["result"] = $result;
        $_SESSION['finish']=array();
        $_SESSION['score']=0;
    }
    if ($op=="2"){
        
    }
     header("Location: Main.php?op=0");
?>