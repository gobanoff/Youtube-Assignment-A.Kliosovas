<header>
    <?php if (isset($_SESSION['loggedin']) and $_SESSION['loggedin']) : ?>
        <h1>Dark Side</h1>
        <p>Are you done? <a href="?page=logout"><strong>Logout</strong></a> </p>
    <?php else : ?>
        <a href="?page=login" class="btn btn-primary " type="submit">LOGIN</a>
        <a href="?page=account" class="btn btn-info">SIGN UP NOW</a>
    <?php endif; ?>

    <form method="GET" action="index.php">
        <input type="text" name="search" class="sch" placeholder="Search">
        <button type="submit" class="btn btn-success">Search</button>
    </form>

    <?php if (isset($_SESSION['loggedin']) and $_SESSION['loggedin']) : ?>
        <a href="?page=download" class="btn btn-danger "> INPUT NEW VIDEO</a>
    <?php endif; ?>

    <div class="nav">


        <a href="?category=fashion">
            <li>Fashion</li>
        </a>
        <a href="?category=music">
            <li>Music</li>
        </a>
        <a href="?category=cars">
            <li>Cars</li>
        </a>
        <a href="?category=trailers">
            <li>Movie Trailers</li>
        </a>
        <a href="?category=comedy">
            <li>Comedy</li>
        </a>
        <a href="?category=sport">
            <li>Sport</li>
        </a>
    </div>
    <style>
        body {
            position: relative;
        }

        .tuve {
            display: grid;
            padding-top: 100px;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 20px;
        }

        .sch {
            width: 500px;
            height: 50px;
            margin-top: 50px;
            border-radius: 6px;
            padding-left: 10px;
        }

        .nav {
            display: flex;
            justify-content: end;
            padding-top: 60px;
            gap: 130px;
            font-weight: 800;
            font-size: 22px;
        }

        .nav a:hover {
            color: rgb(10, 201, 218);
        }

        .btn-danger {
            width: 300px;
            height: 50px;
            border: none;
            position: absolute;
            font-size: 22px;
            font-weight: 600;
            right: 280px;
            top: 145px
        }

        .btn-danger:hover {
            background-color: rgb(10, 201, 218);
        }

        .nav a {
            text-decoration: none;
            color: red;
        }

        .vid iframe {
            border-radius: 10px;
            box-shadow: 5px 5px 10px 1px #676565;
        }

        .btn-success {
            width: 100px;
            margin-left: -8px;
            font-size: 22px;
            font-weight: 600;
            height: 50px;
        }

        .btn-success:hover {
            background-color: rgb(230, 255, 0);
            color: black;
        }
    </style>
</header>