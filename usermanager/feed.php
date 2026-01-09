<?php
session_start();
include "db.php";

if(!isset($_SESSION['userid'])){
    header("location:login.php");
    exit;
}

if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submitpost'])){
    $title=$_POST['title'];
    $content=$_POST['content'];
    $authorid=$_SESSION['userid'];

    if(!empty($title)&&!empty($content)){
        $stmt=$pdo->prepare("INSERT INTO posts (userid, title, content) VALUES (?,?,?)");
        $stmt->execute([$authorid,$title,$content]);
        header("Location:feed.php");
        exit;
    }
}

$sql="SELECT posts.*, users.name as authorname, users.avatar as authoravatar FROM posts JOIN users ON posts.userid=users.id ORDER BY posts.creation DESC";

$stmt=$pdo->query($sql);
$posts=$stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feed</title>
    <link rel="stylesheet" href="css/feed.css">
</head>
<body>
    <nav>
        <a href="main.php">My profile</a>
        <a href="logout.php">Cerrar sesión</a>
    </nav>
    <div class="formulario">
        <h1>Community feed</h1>
        <div class="input">
            <h3>Create a post</h3>
            <form method="post">
                <input type="text" name="title" placeholder="Title" required><br>
                <textarea name="content" placeholder="What's on your mind?" rows="3" required></textarea>
                <button type="submit" name="submitpost">Publicar</button>
            </form>
        </div>
        <?php foreach($posts as $post):?>
            <div class="postcard">
                <div class="posthead">
                    <?php
                        $avatar="./uploads/".($post['authoravatar']?$post['authoravatar']: 'default.jpg');
                        if(!file_exists($avatar)) $avatar="./css/img/aint/2.jpg";
                    ?>
                    <img src="<?=$avatar?>" class="mini-avatar">
                    <strong><?=htmlspecialchars($post['authorname'])?></strong>
                    <span class="postdate"><?=$post['creation']?></span>
                </div>

                <h2><?=htmlspecialchars($post['title'])?></h2>
                <p><?=nl2br(htmlspecialchars($post['content']))?></p>
            </div>
            <?php endforeach;?>

            <?php if(count($posts)==0):?>
                <p>No posts yet.</p>
            <?php endif;?>
    </div>
<audio autoplay loop id="audio">
    <source src="./audio/13.mp3" type="audio/mpeg">
</audio>
    
</body>
</html>