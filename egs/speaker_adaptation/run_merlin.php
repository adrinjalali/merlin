<?php

$text = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $text     = $_POST["text"];
  $filename = substr($text, 0, 40);
  $filename = str_replace(" ", "_", $filename);
  $filename = preg_replace('/[^A-Za-z0-9\_]/', '', $filename);
  `s1/generate-voice-from-text.sh "{$text}" "{$filename}" slt_arctic`;
}else{
  print("what do you think you're doing??");
}
?>
<head>
  HERE IS YOUR FILE
</head>
<body>
  <a href="/s1/experiments/slt_arctic/test_synthesis/wav/<?php echo $filename?>.wav" download>Click to download</a>
</body>
