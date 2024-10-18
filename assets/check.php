<?php

if(isset($_POST['id'])){
    require '../db/dbconnect.php';

    $id = $_POST['id'];

    if(empty($id)){
       echo 'error';
    }else {
        $todos = $pdo->prepare("SELECT id, checked FROM tasks WHERE id=?");
        $todos->execute([$id]);

        $todo = $todos->fetch();
        $uId = $todo['id'];
        $checked = $todo['checked'];

        $uChecked = $checked ? 0 : 1;

        $res = $pdo->query("UPDATE tasks SET checked=$uChecked WHERE id=$uId");

        if($res){
            echo $checked;
        }else {
            echo "error";
        }
        $pdo = null;
        exit();
    }
}else {
    header("Location: ../templates/home.php?mess=error");
}