<?php
    include 'check_spell.php';
    include 'words_creater.php';
    include 'permutation.php';
    
    // print_r(get_words("PIRATE"));
    function Text_Twist_N($n){
        $word=generate_rack($n);
        echo $word;
        echo "<br/>";
        $sub_words=get_words($word);
        $final=array();
        $final[]=$word;
        foreach($sub_words as $sub){
            $result=permutation($sub,0,strlen($sub));
            foreach($result as $permute){
                if (check_spell($permute) and !in_array($permute,$final)){
                    $final[]=$permute;
                }
            }
        }
        print_r($final);
    }
    
    function Text_Twist_W($word){
        echo $word;
        $sub_words=get_words($word);
        $final=array();
        $final[]=$word;
        foreach($sub_words as $sub){
            permutation($sub,0,strlen($sub));
        }
        foreach($GLOBALS['result'] as $permute){
                if (check_spell($permute) and !in_array($permute,$final)){
                    $final[]=$permute;
                }
            }
        return ($final);
    }
    
    
    function Text_Twist_db($word){

        $sub_words=get_words($word);
        // print_r($sub_words);
        $final=array();
        $dbhandle = new PDO("sqlite:scrabble.sqlite") or die("Failed to open DB");
        if (!$dbhandle) die ($error);
        foreach($sub_words as $sub){
            // permutation($sub,0,strlen($sub));
            // get all possible permutation from db
            $arry=str_split($sub);
            natcasesort($arry);
            // print_r($arry);
            $sub=implode($arry);
            $query = "SELECT words FROM racks WHERE rack='".$sub."'";
            // print($query);
            //this next line could actually be used to provide user_given input to the query to 
            //avoid SQL injection attacks
            $statement = $dbhandle->prepare($query);
            $statement->execute();
    
            //The results of the query are typically many rows of data
            //there are several ways of getting the data out, iterating row by row,
            //I chose to get associative arrays inside of a big array
            //this will naturally create a pleasant array of JSON data when I echo in a couple lines
            $words=$statement->fetchAll(PDO::FETCH_ASSOC) ;
                if (!empty($words)){
              
                    foreach(explode('@@',$words[0][words]) as $word){
                        $final[]=$word;
                    }
                }
            
        }
        $final=array_unique($final);
        return ($final);
    }
    
//   print_r( Text_Twist_db("WONDER"));
?>