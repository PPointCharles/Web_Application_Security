<?php
    $dictionary_contents=file_get_contents("dictionary.txt");
    $words = explode("\n", $dictionary_contents);
    foreach($words as $w){
        $r=hash("sha256", $w);
        if ($r=='5743abddddfa08c1e3a99fdebc2e8f3f1108fa12dcd2a8f58a42f141418c22ec' or $r=='5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8'){
            echo 'word:'.$w.';    hash:'.$r.';<br>';
            // break;
            
        }
        
    }
?>