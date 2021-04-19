<?php
// session_start();
require_once 'bin/conn.php';

if (isset($_POST['insert'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $pwd2 = $_POST['pwd2'];
    $errors = [];

    if ($fname == "" || $lname == "" || $email == "" || $pwd == "" || $pwd2 == "") {
        $input_error = "One or more inputs missing a value!";
        array_push($errors, $input_error);
        header('Location: index.php?errors=' . $input_error);
        exit;
    }

    if (!filter_var($email,  FILTER_VALIDATE_EMAIL)) {
        $email_error = "Please supply a valid email address!";
        array_push($errors, $email_error);
        header('Location: index.php?errors=' . $email_error);
        exit;
    }


    if ($pwd != $pwd2) {
        $pwd_error = "Passwords do not match";
        array_push($errors, $pwd_error);
        header('Location: index.php?errors=' . $pwd_error);
        exit;
    } else {
        $pwd_v = md5($pwd);
    }


    $query = "SELECT * FROM users WHERE email LIKE '$email'";
    $check = $conn->query($query)->fetch_array();

    if (count($check) > 0) {
        $check_error = "Email already registered!";
        array_push($errors, $check_error);
        header('Location: index.php?errors=' . $check_error);
        exit;
    }


    if (count($errors) == 0) {
        $date = Date('Y-m-d H:i:s');
        $insert = "INSERT INTO users (fname, lname, pwd, email, created_at ) VALUES ('$fname', '$lname','$pwd_v', 
        '$email', '$date')";

        if ($conn->query($insert)) {
            header('Location: index.php?success=1');
        } else {
            header('Location: index.php?errors=' . mysqli_error($conn));
        }
    }
}


if (isset($_POST['update'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $id = $_POST['id'];
    $errors = [];
    // $changed = true;

    if ($fname == "" || $lname == "" || $email == "") {
        $input_error = "One or more inputs missing a value!";
        array_push($errors, $input_error);
        header('Location:edit.php?id=' . $id . 'errors=' . $input_error);
        exit;
    }

    if (!filter_var($email,  FILTER_VALIDATE_EMAIL)) {
        $email_error = "Please supply a valid email address!";
        array_push($errors, $email_error);
        header('Location:edit.php?id=' . $id . 'errors=' . $email_error);
        exit;
    }


  

    if (count($errors) == 0) {
        $date = Date('Y-m-d H:i:s');
        $insert = "UPDATE users SET fname='$fname', lname='$lname', email='$email' WHERE id='$id'";

        if ($conn->query($insert)) {
            header('Location:edit.php?id=' . $id . 'success=1');
        } else {
            header('Location:edit.php?id=' . $id . 'errors=' . mysqli_error($conn));
        }
    }
}


function checkDuplicates($old, $new)
{

    if ($old == $new) {
        return true;
    } else {
        return false;
    }
}
