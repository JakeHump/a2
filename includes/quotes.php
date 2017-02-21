<?php
$quoteNum = rand(1,3);
if ($quoteNum == 1) {
  $quote = "If you tell the truth, you don't have to remember anything.";
}
if ($quoteNum == 2) {
  $quote = "Don't go around saying the world owes you a living. The world owes you nothing. It was here first.";
}
if ($quoteNum == 3) {
  $quote = "I have never let my schooling interfere with my education.";
}
echo $quote;
 ?>
