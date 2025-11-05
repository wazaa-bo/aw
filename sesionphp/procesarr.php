<?php
$user=$_POST['user'];
$password=$_POST['password'];

$line=file("users.txt",FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$exist=false;

foreach($line as $l){
    list($u,$hash)=explode(":",$l,2);
    if($u===$user){
        $exist=true;
        break;
    }
}
if($exist){
    echo"<script>alert)'This user already exists, change the username or try logging in.');window.location='registro.php'</script>";
    exit;
}
$file=fopen("users.txt","a");
fwrite($file,$user.":".password_hash($password,PASSWORD_DEFAULT). "\n");
fclose($file);

echo"<script>alert('Registro exitoso');window.location='iniciarsesion.php';</script>";
exit;
