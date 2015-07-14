<?php
class Encrypt {
    public $cArray = Array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
    public $oArray = Array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
     
    public function __construct() {
        shuffle($this->cArray);
    }
     
    public function setcArray($s) {
        for ($i = 0; $i < 26; $i++) {
            $this->cArray[$i] = $s[$i];
        }
    }
     
    public function toEncode($s) {
        $r = Array();
        $pattern = "/[a-z]/";
        for ($i = 0; $i < strlen($s); $i++) {
            if (preg_match($pattern, $s[$i])) {
                for ($j = 0; $j < 26; $j++) {   
                    if ($s[$i] == $this->oArray[$j]) {
                        array_push($r, $this->cArray[$j]);
                        break;
                    }
                }
             }            
            else {
                array_push($r, $s[$i]);
            }
        }
         
        return join($r); 
    }
     
    public function toDecode($s) {
        $r = Array();
        $pattern = "/[a-z]/";
         
        for ($i = 0; $i < strlen($s); $i++) {
            if (preg_match($pattern, $s[$i])) {
                for ($j = 0; $j < 26; $j++) {   
                    if ($s[$i] == $this->cArray[$j]) {
                        array_push($r, $this->oArray[$j]);
                        break;
                    }
                }
            }            
            else {
                array_push($r, $s[$i]);
            }
        }
         
        return join($r);
    }
}