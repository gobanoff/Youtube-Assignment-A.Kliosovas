<?php
require_once('db.php');
$user = $_POST['username'];
$email = $_POST['email'];
$pass = md5($_POST['password']);
$repass = md5($_POST['repassword']);



if (
    empty($user) or empty($pass) or empty($repass)
    or empty($email)
) {
    echo "<h1>Fill in all the fields </h1>
    <a href='?page=account'class='btn btn-warning' type='submit'>Try to sign up again</a>";
} else {


    if ($pass != $repass) {
        echo "<h1>Passwords are not the same</h1>
    <a href='?page=account'class='btn btn-warning' type='submit'>Try to sign up again</a>";
    } elseif (strlen($_POST['password']) < 6) {
        echo "<h1>Your password is too short, it must be at least 6 characters</h1>
    <a href='?page=account'class='btn btn-warning' type='submit'>Try to sign up again</a>";
    } else {
        $check = "SELECT username FROM users WHERE username = '$user'";
        $result = $conn->query($check);

        if ($result->num_rows > 0) {
            echo "<h1>This username already exists!<br>You can use for free: idiot, monkey,
        doublebeach, sucker, stupidclown and more other beautiful usernames.</h1>
        <a href='?page=account'class='btn btn-warning' type='submit'>Try to sign up again</a>";
        } else {
            $sql = "INSERT INTO `users` (username, password, email) VALUES ('$user', '$pass', '$email')";
            if ($conn->query($sql)) {
                echo "<h2>Your registration is complete!</h2>";
            }
        }
    }
}
echo "<a href='?page=login'class='btn btn-primary' type='submit'>LOGIN</a>"

?>

<style>
    h1 {
        color: red;
    }

    h2 {
        color: rgb(0, 255, 4);
    }

    .btn-warning {
        margin-right: 50px;
    }
</style>