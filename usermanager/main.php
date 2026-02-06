<?php
session_start();
include "db.php";
if(!isset($_SESSION['userid'])){
    header("Location:login.php");
    exit;
}
$userid=$_SESSION['userid'];
$msg="";
if ($_SERVER['REQUEST_METHOD']== 'POST') {
    $newname=$_POST['name'];
    $newbio=$_POST['bio'];

    if(isset($_FILES['foto'])&& $_FILES['foto']['error']==0) {
        $folder="./uploads/";
        $filename=time()."_".$_FILES['foto']['name'];
        $route=$folder.$filename;

        if(move_uploaded_file($_FILES['foto']['tmp_name'],$route)){
            $stmt=$pdo->prepare("UPDATE users SET avatar=? WHERE id = ?");
            $stmt->execute([$filename,$userid]);
        } else{
            die("Error sql: no se guardó en la base de datos.");
        }
    }
    $stmt=$pdo->prepare("UPDATE users SET name=?,bio=? WHERE id=?");
    if($stmt->execute([$newname,$newbio,$userid])){
        $_SESSION['$flash']="Profile updated";
        $_SESSION['username']=$newname;
        header("location:main.php");
        exit;
    }
}
if(isset($_SESSION['flash'])){
    $msg=$_SESSION['flash'];
    unset($_SESSION['flash']);
}
$stmt=$pdo->prepare("SELECT * FROM users WHERE id=?");
$stmt->execute([$userid]);
$user=$stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/anim.css">
    <title>Dynasty Forum</title>
</head>
<body>
    
    <div class="formulario"> 
        <h1 class="beat-effect"><?=htmlspecialchars($user['name'])?>'s profile</h1><br>

        <?php
            $showfoto="./uploads/".($user['avatar']?$user['avatar']:'default.jpg');
            if(!file_exists($showfoto)){$showfoto="./css/img/aint/2.jpg";}
        ?>
        <img src="<?=$showfoto?>" alt="Profile picture" class="profileimg">

        <?php if($msg):?>
            <p style="color: rgba(134, 255, 118, 1);"> <?=$msg?></p>
        <?php endif;?>
        <form enctype="multipart/form-data" method="post">
            <label>Change picture:</label>
            <input type="file" name="foto" accept="image/*" class="browse">
            <br>
            <label>Name:</label>
            <input type="text" name="name" value="<?=htmlspecialchars($user['name'])?>" required> <br>

            <label>Bio:</label>
            <textarea name="bio" placeholder="Notes(only visible to you)" rows="3"><?=htmlspecialchars($user['bio'])?></textarea> <br>

            
            <button type="submit">Save changes</button><br> <br>
        </form>
        <?php if($_SESSION['rol']=='admin'):?>
        <a href="list.php">Gestionar usuarios</a>
        <?php endif;?>
    </div>
    <header><a href="feed.php">Community</a> <a href="logout.php">Cerrar sesión</a></header>
<audio autoplay loop id="audio">
    <source src="./audio/13.mp3" type="audio/mpeg">
</audio>
<script src="js/audio.js"></script>
<script src="js/vali.js"></script>
</body>
</html>