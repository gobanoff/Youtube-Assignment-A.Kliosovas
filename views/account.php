<section class="form-signin w-100 m-auto">
    <form action="?page=registr" method="post">
        <h1 class="h3 mb-3 fw-normal">REGISTRATION FORM</h1>
        <div class="form-floating">
            <input type="text" class="form-control" name="username" id="floatingPassword" placeholder="Username">
            <label for="floatingPassword">username</label>
        </div>
        <div class="form-floating">
            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput"> e-mail</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword"> password</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="repassword" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">repeat password</label>
        </div>
        <button class="btn btn-primary  py-2" type="submit">CREATE ACCOUNT</button>
    </form>
</section>
<style>
    .form-signin input {
        width: 800px;
        margin-bottom: 10px;
    }

    .h3 {
        margin-top: 50px;
    }

    .form-signin button {
        width: 800px;
        height: 60px;
        font-size: 25px;
        font-weight: 600;
    }

    label {
        color: #CCC;
    }
</style>