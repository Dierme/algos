<?php
/**
 * Created by PhpStorm.
 * User: dierme
 * Date: 26.10.17
 * Time: 15:23
 */


/**
 * Class Pair
 * public int $i
 * public int $js
 */
class Pair{
    public $i;
    public $j;

    public function __construct($i, $j)
    {
        $this->i = $i;
        $this->j = $j;
    }
}

/**
 * Class Element
 * public int $value
 * public Pair $position
 * public Element $predecessor
 */
class Element{
    public $value;
    public $position;
    public $predecessor;

    public function __construct($value, $predecessor, $i, $j)
    {
        $this->value = $value;
        $this->position = new Pair($i, $j);
        $this->predecessor = $predecessor;
    }
}

/**
 * @param $str1
 * @param $str2
 * @return array $result
 * @throws Exception
 */
function StringAlign($str1, $str2){

    $len1 = strlen($str1);
    $len2 = strlen($str2);

    $result = array();
    $result[0] = array();
    $result[1] = array();

    /*
     * init matrix
     */
    $alignMatrix = array();
    for($i = 0; $i < $len1 + 1 ; $i++) {
        for ($j = 0; $j < $len2 + 1; $j++) {
            if($i == 0){
                $j === 0 ?
                    $elem = new Element($j, null, $i, $j) :
                    $elem = new Element($j, $alignMatrix[$i][$j-1], $i, $j);
                $alignMatrix[$i][$j] = $elem;
            }
            else{
                $elem = new Element($i, $alignMatrix[$i-1][$j], $i, $j);
                $alignMatrix[$i][$j] = $elem;
                break;
            }
        }
    }

    /*
     * Compute matrix
     */
    for($i = 1; $i < $len1+1; $i++){
        for($j = 1; $j < $len2+1 ; $j++) {
            $choices = array();
            $cand0 = $alignMatrix[$i-1][$j-1];
            $cand1 = $alignMatrix[$i-1][$j];
            $cand2 = $alignMatrix[$i][$j-1];

            $str1[$i-1] == $str2[$j-1] ?
                $choices[0] = $cand0->value - 1:
                $choices[0] = $cand0->value + 1;

            $choices[1] = $cand1->value + 1;
            $choices[2] = $cand2->value + 1;

            $minChoice = min($choices);

            if($minChoice === $choices[0]){
                $alignMatrix[$i][$j] = new Element($minChoice, $cand0, $i,$j);
            }
            elseif ($minChoice === $choices[1]){
                $alignMatrix[$i][$j] = new Element($minChoice, $cand1, $i,$j);
            }
            elseif($minChoice === $choices[2]){
                $alignMatrix[$i][$j] = new Element($minChoice, $cand2, $i,$j);
            }
        }
    }


    /*
     * Backtrace
     */
    $i = $len1;
    $j = $len2;
    $elem = $alignMatrix[$i][$j];
    while (!is_null($elem->predecessor)) {

        if($elem->predecessor->position->i == $i-1 && $elem->predecessor->position->j == $j-1){
            array_unshift($result[0], $str1[$i-1]);
            array_unshift($result[1], $str2[$j-1]);
            $i--;
            $j--;
        }
        elseif ($elem->predecessor->position->i == $i-1 && $elem->predecessor->position->j == $j){
            array_unshift($result[0], $str1[$i-1]);
            array_unshift($result[1], '_');
            $i--;
        }
        elseif ($elem->predecessor->position->i == $i && $elem->predecessor->position->j == $j-1){
            array_unshift($result[0], '_');
            array_unshift($result[1], $str2[$j-1]);
            $j--;
        }
        else{
            throw new Exception('Impossible to backtrace');
        }
        $elem = $elem->predecessor;
    }

    return $result;
}

function prAligntMatrix($alignMatrix){
    for($i = 0; $i<count($alignMatrix); $i++){
        for($j = 0; $j<count($alignMatrix[$i]); $j++){
            $elem = $alignMatrix[$i][$j];
            print($elem->value);
        }
        print('<br>');
    }
}