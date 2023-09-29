<?php
require_once('db.php');

$name = $_GET['name'];
$videoLink = $_GET['link'];
$videoTitle = $_GET['title'];
$cat = $_GET['cat'];
$desc = $_GET['desc'];
$videoId = $_GET['video_id'];
$cnt = $_GET['cnt'];


try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}


if (isset($videoId)) {

    $update = "UPDATE videobank SET counter = counter + 1 WHERE video_id = :video_id";
    $st = $pdo->prepare($update);
    $st->bindParam(':video_id', $videoId, PDO::PARAM_STR);
    $st->execute();


    $query = "SELECT counter FROM videobank WHERE video_id = :video_id";
    $st = $pdo->prepare($query);
    $st->bindParam(':video_id', $videoId, PDO::PARAM_STR);
    $st->execute();

    $result = $st->fetch(PDO::FETCH_ASSOC);
    $cnt = ($result) ? $result['counter'] : 0;
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Videoplayer</title>
</head>

<body>
    <style>
        body {
            background-color: rgb(238, 231, 224);
            position: relative;
        }

        .btn-success:hover {
            background-color: rgb(230, 255, 0);
            color: black;
        }

        iframe {
            border-radius: 15px;
        }

        .play {
            padding-top: 50px;
        }

        .btn-primary {
            width: 100px;
            height: 50px;
            margin-top: 50px;
            font-size: 22px;
        }

        h1 {
            font-weight: 700;
            padding-top: 20px;
            color: rgb(214, 145, 18);
        }

        .play1 {
            display: flex;
            justify-content: space-between;
        }

        .btn-success {
            width: 100px;
            margin-left: -8px;
            font-size: 22px;
            font-weight: 600;
            height: 50px;
            margin-bottom: 5px;
        }

        .sch {
            width: 500px;
            height: 50px;
            margin-top: 50px;
            border-radius: 6px;
            padding-left: 10px;
        }

        h3 {
            color: rgb(214, 145, 18);
        }

        h2 {
            font-weight: 900;
            margin-top: 50px;
            color: rgb(214, 145, 18);
        }

        textarea {
            padding: 50px;
            font-size: 22px;
            border-radius: 16px;
            background-color: rgb(235, 240, 240);
            margin-top: 20px;
            color: green;width: 1295px;
        }

        h4 {
            color: rgb(214, 145, 18);
        }

        .cnt {
            color: rgb(214, 145, 18);
            position: absolute;
            left: 1100px;
            top: 920px;
            font-size: 25px;
        }

        span {
            color: blue;
        }
    </style>

    <div class="play1">
        <a href="?page=videolist" class="btn btn-primary">BACK</a>
        <form method="GET" action="index.php">
            <input type="text" name="search" class="sch" placeholder="Search">
            <button type="submit" class="btn btn-success">Search</button>
        </form>
    </div>

    <div class="play">
        <iframe src="<?php echo $videoLink; ?>" allowFullscreen height="680" width="1300"></iframe>
    </div>
    <h1><?php echo $videoTitle; ?></h1>
    <h3>Uploaded by :<span> <?php echo $name; ?></span></h3>
    <h5 class="cnt"> This video has been watched :
        <span id="viewCount"><?php echo $cnt; ?> </span>
    </h5>
    <h4>Category :<span> <?php echo $cat; ?></span></h4>
    <h2>Description : </h2>

    <textarea name="myTextarea" placeholder="Description :" cols="121" rows="20" minlength="10" maxlength="500" required><?php echo $desc; ?> 
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium maiores nisi quisquam, eveniet adipisci harum. Consectetur consequuntur quam excepturi magni doloremque dignissimos labore, iste maiores quaerat itaque. Ratione accusantium tenetur porro quis obcaecati iusto dignissimos debitis aliquam, eligendi ducimus similique accusamus natus deserunt corrupti, saepe cumque animi? Blanditiis nihil tenetur porro eaque totam corrupti tempore. Quibusdam quam impedit velit omnis, ipsa eaque officiis voluptas. Ipsum corporis reprehenderit animi repellat! Nesciunt assumenda blanditiis corporis quos eos soluta error non temporibus, perferendis nihil impedit hic quidem repellat, cupiditate ex sequi officiis laborum perspiciatis tenetur ullam ad! Corporis exercitationem magni dolor aliquid, ducimus eaque nam sapiente vitae cumque unde reiciendis odio delectus fuga cupiditate libero illum enim ea cum omnis nemo ipsum ab nobis eos dolorum! Labore nesciunt a at magnam voluptatum? Esse assumenda laboriosam aliquid labore necessitatibus qui eum quisquam at quaerat aliquam? In incidunt neque accusantium pariatur dicta nisi veniam dolore adipisci ad nam voluptatem dolores distinctio nulla at animi reprehenderit sequi voluptate, voluptas quaerat non nostrum ex vitae quisquam. Dolore amet molestias ipsa ad sunt eum autem saepe incidunt libero modi, commodi error similique culpa dolores voluptates pariatur placeat at ducimus? Facilis perferendis at deleniti magni necessitatibus, vitae porro ab. Cum sequi facere possimus sapiente consequuntur accusamus, autem assumenda quidem quaerat unde, odit consectetur obcaecati excepturi soluta. Molestias cupiditate earum soluta aliquid nostrum, fuga eos a praesentium nemo iusto sed sequi adipisci! Architecto quam repellat atque est minus magni pariatur sit, consectetur nam veniam a expedita necessitatibus odit doloremque labore, optio vel illo ducimus impedit reprehenderit totam. Architecto amet asperiores unde a, suscipit accusantium in blanditiis neque commodi dignissimos repellat aperiam veniam facere? Repellendus dolores sequi nulla! Molestias perspiciatis nam autem totam nulla itaque voluptate, natus quis optio reiciendis saepe tempore temporibus exercitationem assumenda ab rem officiis adipisci iste? Veritatis? </textarea>
</body>

</html>