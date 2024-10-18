<?php

if(isset($_POST['id'])){
    require '../db/dbconnect.php';

    $id = $_POST['id'];

    if(empty($id)){
       echo 0;
    }else {
        $stmt = $pdo->prepare("DELETE FROM tasks WHERE id=?");
        $res = $stmt->execute([$id]);

        if($res){
            echo 1;
        }else {
            echo 0;
        }
        $pdo = null;
        exit();
    }
}else {
    header("Location: ../template/home.php?mess=error");
}