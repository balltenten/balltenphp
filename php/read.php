<?php
 $goal = array();
 $assist = array();
 $yellowcard = array();
 $redcard = array();

$file = fopen($_POST['importfile'],"r");
$i = 0;
while(($row = fgetcsv($file,0,","))!== FALSE)
  {
    if($i != 0 ){
      $goal[] = $row[0];
      $assist[] = $row[1];
      $yellowcard[] = $row[2];
      $redcard[] = $row[3];
    }
    $i++;
  }
  $totalscore = 0;
  $totalassist = 0;
  $totalyellow = 0;
  $totalred = 0;
  for($j=0 ;$j<$i-1;$j++){
    $totalscore += $goal[$j];
    $totalassist += $assist[$j];
    $totalyellow += $yellowcard[$j];
    $totalred += $redcard[$j];
    }
$match = $i-1;
$avggoal = $totalscore / ($i-1);
$avgassist = $totalassist / ($i-1);
$avgyellow = $totalyellow / ($i-1);
$avgred = $totalred / ($i-1);
fclose($file);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Status</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="mystyle.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>
        </ul>
    </div>
</nav>
<div class="container mt-3" style="font-size: 50px">
        YOUR STATUS
        <h1 style="border-bottom: grey solid 2px"></h1>
    </div>
    <div class="container">
        <p>Match played : <span style="font-weight: bold"><?php echo $match?></span></p>
        <p>Goals : <span style="font-weight: bold"><?php echo $totalscore;echo"   "?></span>
        Assists : <span style="font-weight: bold"><?php echo $totalassist?></span></p>
        <p>Yellowcard : <span style="font-weight: bold"><?php echo $totalyellow;echo"   "?></span>
             Redcard : <span style="font-weight: bold"><?php echo $totalred?></span></p>
        <p>Goals per match : <span style="font-weight: bold"><?php echo $avggoal ;echo"   "?></span>
             Assists per match : <span style="font-weight: bold"><?php echo $avgassist?></span></p>
    </div>
<div class="table">
  <table class="table" style = "text-align:center">
    <thead>
      <tr>
      <th>Goal</th>
      <th>Assist</th>
      <th>Yellowcard</th>
      <th>Redcard</th>  
      </tr>
    </thead>
    <tbody>
            <?php
        $goal = array();
        $assist = array();
        $yellowcard = array();
        $redcard = array();

        $file = fopen($_POST['importfile'],"r");
        $i = 0;
        while(($row = fgetcsv($file,0,","))!== FALSE)
        {
            if($i != 0 ){
            $goal[] = $row[0];
            $assist[] = $row[1];
            $yellowcard[] = $row[2];
            $redcard[] = $row[3];
            }
            $i++;
        }
        $totalscore = 0;
        $totalassist = 0;
        $totalyellow = 0;
        $totalred = 0;
        for($j=0 ;$j<$i-1;$j++){
            $totalscore += $goal[$j];
            $totalassist += $assist[$j];
            $totalyellow += $yellowcard[$j];
            $totalred += $redcard[$j];
            echo"<tr>";
            echo"<th> $goal[$j]";
            echo"<th> $assist[$j]";
            echo"<th> $yellowcard[$j]";
            echo"<th> $redcard[$j]";
            echo"</th></tr>";
            }
        fclose($file);
        ?>
    </tbody>
  </table>
</div>
</body>
</html>