<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name=viewport content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css" />
        <link rel="stylesheet" href="css/a2.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
        <title>Scrabble Word Score Calculator</title>
    </head>

    <body id="home">
        <div class="container">
            <div class="row">
                <div class="twelve columns">
                    <header>
                        <h1>Scrabble Word Score Calculator</h1>
                        <img src="images/scrabble.jpg" alt="scrabble">
                        <br>
                        <form method='GET' action='index.php'>
                            <div>
                                <label>Enter your word (Required):  <input type='text' name='searchTerm'></label>
                                <p>The word must be all letters and no numbers.  Between 2 and 7 characters are expected. </p>
                                <p>Scroll down for results, after calculating. </p>
                                <h3>Bonus Points</h3>
                                <label for="none"><input type="radio" name="bonus" id="none" value="none" checked="checked"/> None</label>
                                <label for="double"><input type="radio" name="bonus" id="double" value="double" /> Double Word Score</label>
                                <label for="triple"><input type="radio" name="bonus" id="triple" value="triple" /> Triple Word Score</label>
                                <label for="bingo"><input type="checkbox" name="bingo" id="bingo" value="bingo" /> Include 50 point bingo (word that uses all 7 tiles)</label>
                                <input type='submit' name='calculate' value='calculate'>
                            </div>
                        </form>
                    </header>
                </div>
            </div>
            <div class="row">
                <div class="twelve columns">
                    <footer>
                        <p>Provide feedback to <a href="mailto:jakehumphrey@yahoo.com" target="_top">Jake Humphrey</a>.</p>
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
      require("Tools.php");
      require("Scrabble.php");

      if(isset($_GET['calculate'])) {
          # First, sanitize the data to protect from security issues
          # Next, set the variables that will be passed
          $searchTerm = DWA\Tools::sanitize($_GET['searchTerm']);
          $bonus = DWA\Tools::sanitize($_GET['bonus']);

          # Since the checkbox only is noted in the URL if checked on,
          # I perform some logic to always have a value to pass
          if (isset($_GET['bingo'])) {
              DWA\Tools::sanitize($_GET['bingo']);
              $bingo='checked';
          }
          else {
              $bingo='unchecked';
          }
          echo "<div class=\"row\" id=\"choices\"><div class=\"twelve columns\"><p>";
          echo "You searched for ".$searchTerm .", the Bonus is " .$bonus .", and bingo is " .$bingo .".";
          echo "</p></div></div>";

          # Create an instance of Scrabble to calculate
          new Scrabble($searchTerm, $bonus, $bingo);
      }
?>
