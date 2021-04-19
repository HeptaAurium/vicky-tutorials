<?php

require_once 'bin/conn.php';

if(isset($_POST['delete'])){
    $user = $_POST['user'];

    $query = "DELETE FROM users WHERE id='$user'";
    $delete = $conn->query($query);

    if($delete){
        header('Location: show.php?success=1');
    }else{
        header('Location: show.php?success=0');
    }
}