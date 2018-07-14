<?php include 'database.php' ?>

<?php session_start(); ?>

<?php 
	//Check if score is set
	if(!isset($_SESSION['score']))
	{
		$_SESSION['score']=0;
	}

	if($_POST)
	{
		$number = $_POST['number'];
		$selected_choice = $_POST['choice'];

		$next = $number+1;

		//Get total questions
		$query = "SELECT * FROM questions";

		//Get Result
		$result = $mysqli->query($query) or die ($mysqli->error.__LINE__);

		$total = $result->num_rows;


		//Get correct choice
		$query = "SELECT * FROM choices WHERE question_number=$number AND is_correct=1";

		//Get Result
		$result = $mysqli->query($query) or die ($mysqli->error.__LINE__);

		//Get Row
		$row = $result->fetch_assoc();

		//Set correct choice
		$correct_choice = $row['id'];

		//Compare
		if($correct_choice==$selected_choice)
		{
			//Correct Answer
			$_SESSION['score']++;
		}

		//Check if you're on the last question
		if($number==$total)
		{
			header("Location: final.php");
		}
		else

		{
			header("Location: question.php?n=".$next);
		}

	}
?>