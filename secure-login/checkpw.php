<?php
function getpassword(){
    $hash='72ab994fa2eb426c051ef59cad617750bfe06d7cf6311285ff79c19c32afd236';
    $files1 = scandir('./SecLists/Passwords');
    // $passwd="1q2w3e4r\n";
    foreach($files1 as $x){
        if (strpos($x, '.txt')){
            print($x).'<br>';
        
            $handle = fopen('./SecLists/Passwords/'.$x, "r");
            if ($handle) {
                while (($line = fgets($handle)) !== false) {
                    $line=str_replace(array("\r", "\n"), '', $line);
                    if(strcmp(hash("sha256", $line),$hash)==0){
                        fclose($handle);
                        return $line;
                    }
                    
                }
            }
        }
    }
}
print(getpassword());
//     var_dump(is_file('a_file.txt')) . "\n";
// var_dump(is_file('/usr/bin/')) . "\n";
?>