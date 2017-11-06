<?php
/**
 * Created by PhpStorm.
 * User: dierme
 * Date: 29.10.17
 * Time: 15:57
 */
include 'StringAlign.php';
//
//$str1 = 'AGACTGTC';
//$str2 = 'TAGTCACG';
//$res = StringAlign($str1, $str2);
//
//for($i = 0; $i < count($res) ; $i++) {
//    for ($j = 0; $j < count($res[$i]); $j++) {
//        print ($res[$i][$j]);
//    }
//    print ('<br>');
//}

$request = $_SERVER['REQUEST_METHOD'];

if($request == 'POST'){
    if(!isset($_POST['seq1'])){
        throw new Exception('seq1 not set');
    }

    if(!isset($_POST['seq2'])){
        throw new Exception('seq2 not set');
    }

    if (!preg_match('/^[A-Za-z0-9_-]*$/', $_POST['seq1'])) {
        throw new Exception('seq1 is bad');
    }
    if (!preg_match('/^[A-Za-z0-9_-]*$/', $_POST['seq2'])) {
        throw new Exception('seq2 is bad');
    }
    $result = StringAlign($_POST['seq1'], $_POST['seq2']);

    require 'views/align.view.php';


}

if($request == 'GET'){
    require 'views/align.view.php';
}


