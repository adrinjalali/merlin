<?php

$text = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $text = $_POST["text"];
  $output = `s1/generate-voice-from-text.sh "{$text}" slt_arctic`;
}
