<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error{color:red;}
    </style>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
     name:<input type="text" name="fname">
     <span class="error">*<?php echo $goErr; ?></span>
     <br>
     email:<input type="email" name="email">
     <span class="error">*<?php echo $wentErr; ?></span>
     <br>
     <input type="submit"value="submit">

</form>
<?php 
$goErr=$wentErr="";
$fname=$email="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"])) {
      $goErr = "Name is required";
    } else {
      $fname = test_input($_POST["fname"]);
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
      $wentErr = "email is required";
    } else {
      $email = test_input($_POST["email"]);
        }
}
function test_input($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
echo $fname."<br>";
echo $email;
?>
</body>
</html>