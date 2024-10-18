<?php

if(isset($_POST['title'])){
    require '../db/dbconnect.php';

    $title = $_POST['title'];

    if(empty($title)){
        header("Location: ../templates/home.php?mess=error");
    }else {
        $stmt = $pdo->prepare("INSERT INTO tasks(title) VALUES(?)");
        $res = $stmt->execute([$title]);

        if($res){
            header("Location: ../templates/home.php?mess=success"); 
        }else {
            header("Location: ../templates/home.php");
        }
        $pdo = null;
        exit();
    }
}else {
    header("Location: ../templates/home.php?mess=error");
}