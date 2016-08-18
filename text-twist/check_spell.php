<?php
// echo 'Current PHP version: ' . phpversion();

// $pspell_link = pspell_new("en");
function check_spell($word){
    $pspell_link=pspell_new('en');
    if (pspell_check($pspell_link, $word)) {
        return true;
    } else {
        return false;
    }
}
?>