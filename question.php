<?php include 'database.php'; ?>

<?php session_start(); ?>

<?php

	//Get question number
    if(!isset($_GET["n"]))
    {
        $ques_no = 1;
    }
    else
    {
        $ques_no = $_GET["n"];
    }


	//Get total questions
	$query = "SELECT * FROM questions";

	//Get Result
	$result = $mysqli->query($query) or die ($mysqli->error.__LINE__);
	$total = $result->num_rows;

	//Get Question
	$query = "SELECT * FROM questions WHERE question_number=$ques_no";

	//Get Result
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	$question = $result->fetch_assoc();

	//Get Choices
	$query = "SELECT * FROM choices WHERE question_number=$ques_no";

	//Get Results
	$choices = $mysqli->query($query) or die($mysqli->error.__LINE__);

?>

<!DOCTYPE html>
<html>
<head>
	<title>TechShots</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">

    </script>
</head>
<body>
	<header>
		<div class="container">
			<h1>TechShots</h1>
		</div>
	</header>
	<main>
		<div class="container">
			<div class="current">
				Question <?php echo $ques_no; ?> of <?php echo $total; ?>
			</div>
			<p class="question">
				<?php echo $question['text']; ?>
			</p>
			<form method="post" action="process.php?n=<?php echo ($ques_no); ?>">
				<ul class="choices">
					<?php while($row=$choices->fetch_assoc()) : ?>
						<li><input type="radio" name="choice" value="<?php echo $row['id']; ?>"><?php echo $row['text']; ?></li>
					<?php endwhile; ?>
				</ul>
                <button class="start" type="submit" value="submit"><?php if($ques_no != $total) echo "Next"; else echo "Submit"; ?></button>
			</form>
		</div>
	</main>
	<footer>
		<div class="container">
			Copyright &copy; 2018, PHP Quizzer
		</div>
	</footer>
</body>
</html>