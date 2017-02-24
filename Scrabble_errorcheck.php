<?php

class Scrabble {

    /**
    * Constructor - where the magic happens
    */
    public function __construct($word, $bonus, $bingo) {
      echo 'You entered ' .$word .' and it is ' .strlen($word) .' long.';
      echo 'The bonus is ' .$bonus .' ';
      echo 'The bingo is ' .$bingo .' ';

      if(strlen($word) <= 7 and strlen($word) >=2 and ctype_alpha($word) ) {
          $word=strtolower($word);
          echo $word .' is a valid input of type ' .gettype($word);
          echo 'The result is ' .$this->consume($word, $bonus, $bingo);
      }
      else {
          echo $word .' is not a valid input';
      }
    }
    /**
	*consume processes the inputted word outputting a total score
	*/
    private function consume($input, $bonus, $bingo) {
        $alphabet=
            [
                'a' => 1, 'b' => 3, 'c' => 3, 'd' => 2,
                'e' => 1, 'f' => 4, 'g' => 2, 'h' => 4,
                'i' => 1, 'j' => 8, 'k' => 5, 'l' => 1,
                'm' => 3, 'n' => 1, 'o' => 1, 'p' => 3,
                'q' => 10, 'r' => 1, 's' => 1, 't' => 1,
                'u' => 1, 'v' => 4, 'w' => 4, 'x' => 8,
                'y' => 4, 'z' => 10,
            ]; #Array of letter a-z that values each char
        $results = 0;

        foreach(str_split($input) as $character) {
            $results = $results + $alphabet[$character];
        } # character by character conversion to a total number

        if ($bonus == 'double') {
            $results = $results * 2;
        } # multiply for double word score

        if ($bonus == 'triple') {
            $results = $results * 3;
        } # multiply for triple word score

        if ($bingo == 'TRUE') {
            $results = $results + 50;
        } # add bingo bonus points

        return $results;
    }

} //eoc
