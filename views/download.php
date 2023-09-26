<style>
    .form-control {
        margin-bottom: 10px;
    }

    .h3 {
        padding-top: 50px;
    }
</style>



<section class="form-signin w-100 m-auto">
    <form action="?page=addvideo" method="post">
        <h1 class="h3 mb-3 fw-normal"> INPUT NEW VIDEO DATA </h1>

        <div class="form-floating">
            <input type="text" class="form-control" name="username" id="floatingInput">
            <label for="floatingInput"> username</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" name="videotitle" id="floatingPassword">
            <label for="floatingPassword"> videotitle</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" name="link" id="floatingInput">
            <label for="floatingInput"> link</label>
            <div class="form-floating">
                <input type="text" class="form-control" name="category" id="floatingInput">
                <label for="floatingInput"> category</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="video" id="floatingInput">
                <label for="floatingInput"> video</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="description" id="floatingInput">
                <label for="floatingInput"> description</label>
            </div>
            <button class="btn btn-danger " type="submit">ADD NEW VIDEO</button>
    </form>
</section>