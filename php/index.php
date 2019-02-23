<?php
$error = '';
$name = '';
$lastname = '';
$c = 0;
function clean_text($string){
   $string = trim($string);
   $string = stripcslashes($string);
   $string = htmlspecialchars($string);
   return $string;
}
if(isset($_POST["check"])){
    $c = 1;
  if(empty($_POST["name"])){
    $error .= '<p><label class = "text-danger">Please Enter Your Name</label></p>';
  }
  else{
    $name = clean_text($_POST["name"]);
    if(!preg_match("/^[a-zA-Z ]*$/",$name)){
      $error .= '<p><label class = "text-danger">Only letters and white space allowed </label></p>';
    }
  }
  if(empty($_POST["lastname"])){
    $error .= '<p><label class = "text-danger">Please Enter Your Lastname</label></p>';
  }
  else{
    $lastname = clean_text($_POST["lastname"]);
    if(!preg_match("/^[a-zA-Z ]*$/",$lastname)){
      $error .= '<p><label class = "text-danger">Only letters and white space allowed </label></p>';
    }
  }  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>TRAINING SECTION</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="mystyle.css">
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

            <li class="nav-item active">
                <a class="nav-link" href="data.csv" download="">Download CSV<span class="sr-only">(current)</span></a>
            </li>

        </ul>

        </ul>
    </div>
</nav>
<br><br>
<div class="container">
  <h2>Player Status</h2>
  <br>
  <form method="post">
    <?php echo $error;?>
    <div class="form-group">
      <label for="name">FirstName:</label>
      <input type="name" class="form-control" placeholder="Enter Your firstname" name="name" value ="<?php echo $name; ?>" />
    </div>
    <div class="form-group">
      <label for="lastname">Lastname:</label>
      <input type="text" class="form-control"placeholder="Enter Your lastname" name="lastname"value ="<?php echo $lastname; ?>"/>
    </div>
  </div>
    <div class ="form-group" align = "right">
      <input type="submit" name="check" class="btn btn-info" value="check">
    </div>
</form>
<form method="post" action="read.php">
<label for="importfile">Import File CSV</label>
    <input type="file" <?php if($error != "" or $c == 0) {?> disabled="disable" <?php } ?>class="form-control-file" id="importfile" name = "importfile" accept=".csv"required=""><br>
    <input type='submit' <?php if($error != "" or $c == 0) {?> disabled="disable" <?php } ?> id='submitbtn' name='save' value='Submit' class='btn btn-info'><br>
</form>
</div>
</body>
</html>