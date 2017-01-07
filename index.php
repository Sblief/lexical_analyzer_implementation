<?php
include ("Processor.php");
echo "<div class=\"container\">
  <div class=\"well\">
    <h1>Lexical Analyzer</h1>
</div>";
echo "<div class=\"container well\">"."<br>";
if (!empty($_POST)){
    $data = htmlspecialchars($_POST['input']);
    echo "<br>"."<p>Your code"." ".$data."<br><hr></p>";
    $processor = new Processor();
    $process = $processor->process($data);
}
else{
    echo "<br>"."<h4>Please Input Your code below for Lexical Analysis</h4><br><br>";
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Lexical Analyzer</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <textarea class="form-control"  name="input" rows="10"  placeholder="Give Your Code" required>
#include <stdio.h>
    int main (){
    int a, b, sum;
    a = 10;
    b = 20;
    sum = a+b;
    if (sum => 10) printf (sum);
}
            </textarea>
            <input class="btn btn-success" type="submit" value="Analyze">
        </div>
    </form>
</div>
</body>
</html>