<?php

class Scrabble {

    /**
    * Constructor - where the magic happens
    */
    public function __construct($word, $bonus, $bingo) {
      if(strlen($word) <= 7 and strlen($word) >=2 and ctype_alpha($word) ) {
          $word=strtolower($word);
          echo "<div class=\"row\" id=\"posres\"><div class=\"twelve columns\"><p>";
          echo "The result is " .$this->consume($word, $bonus, $bingo) .".";
          echo "</p></div></div>";
      } # check to see if the word is a valid length for scrabble and that it is text
      else {
          echo "<div class=\"row\" id=\"negres\"><div class=\"twelve columns\"><p>";
          echo $word ." is not a valid input.  The input must be between 2 and 7 letters long.";
          echo "</p></div></div>";
      } # notify the input did not meet the requirement
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

        if ($bingo == 'checked') {
            $results = $results + 50;
        } # add bingo bonus points

        return $results;
    }

} //eoc
