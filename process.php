<?php include 'database.php' ?>

<?php session_start(); ?>

<?php 
	//Check if score is set
	if(!isset($_SESSION['score']))
	{
		$_SESSION['score']=0;
	}

        //Get the question number
        $ques_no = $_GET["n"];
	    //The selected choice
		if(!isset($_POST['choice']))
        {
            $selected_choice=-1;
        }
        else
        {
            $selected_choice = $_POST['choice'];
        }

		//Get total questions
		$query = "SELECT * FROM questions";

		//Get Result
		$result = $mysqli->query($query) or die ($mysqli->error.__LINE__);
        //Get total no of ques
		$total = $result->num_rows;

		//Get correct choice
		$query = "SELECT * FROM choices WHERE question_number=$ques_no AND is_correct=1";

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
            $_SESSION['answered'][$ques_no-1]=1;
		}
		else
        {
            //Wrong Answer
            $_SESSION['answered'][$ques_no-1]=0;
        }

        //Calculating the new score
        $score=0;
        for($x = 0; $x < $total; $x++)
        {
            if($_SESSION['answered'][$x]==1)
            {
                $score++;
            }
        }
        $_SESSION['score']=$score;

		//Check if you're on the last question
		if($ques_no==$total)
		{
			header("Location: final.php");
		}
		else
		{
		    $next = $ques_no + 1;
			header("Location: question.php?n=".$next);
		}


?>