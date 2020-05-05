<?php 

function genTxref() {
        $txref = "RAVE-";
        for ($i = 0; $i < 10; $i++) {
            $txref .= mt_rand(0, 9);
        }
        return $txref;
    }

    // function genTxref(){
    //     $txref = ""; 
    
    //     $alpabets = ['a','A','b','B','c','C','d','D','e','E','f','F','g','G','h','H','i','I','j','J',
    //     'k','K','l','L','m','M','n','N','o','O','p','P','q','Q','r','R','s','S','t','T',
    //     'u','U','v','V','w','W','x','X','y','Y','z','Z'];
    
    //     for($i = 0 ; $i < 26 ; $i++){
    
    //       $index = mt_rand(0,count($alphabets)-1);
    //       $txref .= $alphabets[$index];
    //     }
    
    //     return $txref;
    // }