<?php


require_once('db.php');
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];


    if (empty($email) or empty($pass)) {
        echo "<h2>Fill all the fields</h2>";
    } else {


        $sql = "SELECT*FROM `users` WHERE  email = '$email' AND password = '$pass'";
        $rez = $conn->query($sql);

        if ($rez->num_rows > 0) {

            while ($row = $rez->fetch_assoc()) {
                $_SESSION['loggedin'] = true;
                header('Location:?page=admin');
                exit;
            }
        } else {
            header('Location:?page=');
            exit;
        }
    }
}
?>




<section class="form-signin w-100 m-auto">
    <form method="post">
        <h1 class="h3 mb-3 fw-normal"> LOGIN </h1>

        <div class="form-floating">
            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput"> email</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword"> password</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">LOGIN</button>
    </form>
</section>
<style>
    html,
    body {
        height: 100%;
    }

    .h3 {
        font-size: 40px;
        color: #CCC;
    }

    .form-signin {
        max-width: 330px;
        padding: 1rem;
    }

    label {
        color: #CCC;
    }

    .form-signin .form-floating:focus-within {
        z-index: 2;
    }

    h2 {
        color: red;
    }

    .form-signin input[type="email"] {

        margin-bottom: 10px;
        border-radius: 10px;
    }

    .form-signin input[type="text"] {
        margin-bottom: 10px;
        border-radius: 10px;

    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-radius: 10px;

    }
</style>