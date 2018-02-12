<?php

$text = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $text     = $_POST["single-text"];
  $filename = substr($text, 0, 40);
  $filename = str_replace(" ", "_", $filename);
  $filename = preg_replace('/[^A-Za-z0-9\_]/', '', $filename);
  `s1/generate-voice-from-text.sh "{$text}" "{$filename}" slt_arctic`;
?>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</head>
<body>
  <br>
  <div class="container-fluid">
    <div class="row justify-content-center" style="height:100%">
      <a href="/s1/experiments/slt_arctic/test_synthesis/wav/<?php echo $filename?>.wav" download><button type="button" class="btn btn-secondary">Click to download</button></a>
    </div>
  </div>
</body>
<?php
}else{
  print("what do you think you're doing??");
}
?>
