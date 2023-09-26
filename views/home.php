<?php

$db = new PDO("mysql:host=localhost;dbname=alextube", "root", "");

$info = [];

$category = isset($_GET['category']) ? $_GET['category'] : '';
$search = isset($_GET['search']) ? $_GET['search'] : '';

if (!empty($category)) {

	$sql = "SELECT * FROM videobank WHERE category = :category LIMIT 20";
	$query = $db->prepare($sql);
	$query->bindParam(':category', $category);
} elseif (!empty($search)) {

	$sql = "SELECT * FROM videobank WHERE videotitle LIKE :search LIMIT 20";
	$query = $db->prepare($sql);
	$query->bindValue(':search', '%' . $search . '%');
} else {

	$sql = "SELECT * FROM videobank LIMIT 20";
	$query = $db->query($sql);
}

if ($query->execute()) {
	$info = $query->fetchAll(PDO::FETCH_ASSOC);
} else {
	print_r($query->errorInfo());
}




?>






<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css" />
	<title>Document</title>
</head>

<body>
	<style>
		.tuve {
			display: grid;
			padding-top: 100px;
			grid-template-columns: 1fr 1fr 1fr 1fr;
			gap: 20px;
		}

		.btn-success:hover {
			background-color: rgb(230, 255, 0);
			color: black;
		}

		.btn-info:hover {
			background-color: rgb(230, 255, 0);
		}

		.btn-primary:hover {
			background-color: rgb(230, 255, 0);
			color: black;
		}

		.nav a:hover {
			color: rgb(10, 201, 218);
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

		.btn-primary {
			width: 200px;
			height: 50px;
			margin-top: 20px;
			font-size: 22px;
			font-weight: 600;
			margin-right: 50px;
		}

		.btn-info {
			width: 200px;
			height: 50px;
			margin-top: 20px;
			font-size: 22px;
			font-weight: 600;
			margin-right: 50px;
		}
         
		.btn-success {
			width: 100px;
			margin-left: -8px;
			margin-bottom: 5px;
		}

		.nav a {
			text-decoration: none;
			color: red;
		}

		.vid iframe {
			border-radius: 10px;
			box-shadow: 5px 5px 10px 1px #676565;
		}

		a {
			text-decoration: none;
		}
	</style>

	<?php include './views/includes/header.php' ?>

	<div class="tuve">
		<?php foreach ($info as $data) : ?>
		<a href="?page=videoplayer&link=<?php echo urlencode($data['link']); ?> &cat=<?php echo urlencode($data['category']);?>
	    &title=<?php echo urlencode($data['videotitle']); ?>&name=<?php echo urlencode($data['username']); ?>
		&desc=<?php echo urlencode($data['description']); ?>&cnt=<?php echo urlencode($data['counter']); ?>
		&video_id=<?php echo urlencode($data['video_id']); ?>">


				<div class="vid">

					<iframe src="<?php echo $data['link']; ?>" height="220" width="350">

					</iframe>
					<h4><?php echo $data['videotitle']; ?></h4>
				</div>
			</a>

		<?php endforeach; ?>

	</div>

</body>

</html>