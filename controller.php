<?php

	//error_reporting(E_ALL);       # Report Errors, Warnings, and Notices
	//ini_set('display_errors', 1); # Display errors on page (instead of a log file)

	//$words = file_get_contents("http://www.paulnoll.com/Books/Clear-English/words-01-02-hundred.html");
	
	$handle = fopen("words.txt", "r") or die("Unable to open file!");;
	// create an array to store all the words

	$wordList = Array();

	while (!feof($handle))
	{
		$word = fgets($handle);
		array_push($wordList, $word);
	}

	fclose($handle);

	/*
	$wordList = Array('Harvard', 
					  'Monkey',
					  'Violin',
					  'Apple',
					  'Goldfish',
					  'Swimming',
					  'Computer',
					  'Magic',
					  'Coffee',
					  'Disney');
	*/

	$numberOfWords = 0;
	$userMessage = "";
	$passwordString = "";
	$includeNumber = FALSE;
	$specialCharacter = FALSE;


	// make sure the numberOfWord is greater than 0 and less than or equal to 4
	if (isset($_POST["numberOfWords"]))
	{
		$numberOfWords = $_POST["numberOfWords"];
		if ($numberOfWords <= 0 || $numberOfWords > 4)
		{
			$userMessage = "Please enter a valid number for words!";
		}
		else 
		{
			$numberOfWords = $_POST["numberOfWords"];
		}
	}
	
	// get the values of the checkboxes
	if (isset($_POST["number"]))
	{
		$includeNumber = TRUE;
	}
	

	if (isset($_POST["specialCharacter"]))
	{
		$specialCharacter = TRUE;
	}

	// create an array to store the words
	$wordsPicked = Array();
	
	// make sure that the $numberOfWords is valid
	if ($numberOfWords <= 0 || $numberOfWords > 4)
	{
		return;
	}

	// handle each different case
	else if ($includeNumber && $specialCharacter)
	{
		generatePassword($numberOfWords, $wordList);
		$wordsPickedAndNumber = addNumber($wordsPicked);
		$wordsPickedFinal = addCharacter($wordsPickedAndNumber);
		$passwordString = printPassword($wordsPickedFinal, $passwordString);
	}
	else if ($includeNumber)
	{

		generatePassword($numberOfWords, $wordList);
		$wordsPicked = addNumber($wordsPicked);
		$passwordString = printPassword($wordsPicked, $passwordString);
	}
	
	else if ($specialCharacter)
	{

		generatePassword($numberOfWords, $wordList);
		$wordsPicked = addCharacter($wordsPicked);
		$passwordString = printPassword($wordsPicked, $passwordString);
	}
	
	else
	{
		//$wordsPicked = generatePassword($numberOfWords, $wordsPicked, $wordList);
		generatePassword($numberOfWords, $wordList);
		$passwordString = printPassword($wordsPicked, $passwordString);
	}

	/* 
	 *	This is a function that generates random words inside an array. 
	 *  @param: $numberOfWords, $array, $wordList
	 *  @return: N/A
	 */
	function generatePassword($numberOfWords, $wordList)
	{
		global $wordsPicked;
		// pick random numbers that matches the number user inputs
		for ($i = 0; $i < $numberOfWords; $i++)
		{
			
			$randomNumber = rand(0, count($wordList) - 1);

			/* 
				This is loop that checks to make sure the same number isn't picked 
				again. It is unnecessary here since the wordList is so big. 
				It was useful in debugging with an array of 10 items. 
			*/
			/*
			for ($j = 0; $j < count($randomNumbers); $j++)
			{
			
				while ($randomNumbers[$j] == $randomNumber)
				{
					$randomNumber = rand(0, count($wordList) - 1);
					print $randomNumber . "<br>";
				}

			}
			*/
			// push into array
			array_push($wordsPicked, $wordList[$randomNumber]);

		}
	}

	/* 
	 *	This is a function that loops over an array and prints the password string
	 *  @param: $wordsPicked, $passwordString
	 *  @return: $passwordString
	 */
	function printPassword($wordsPicked, $passwordString)
	{
		for ($i = 0; $i < count($wordsPicked); $i++)
		{
			$passwordString .= $wordsPicked[$i] . " ";
		}	
		return $passwordString;
	}
	
	/* 
	 *	This is a function that adds a number to the array
	 *  @param: $wordsPicked
	 *  @return: $wordsPicked
	 */
	function addNumber($wordsPicked)
	{
		$keyNumber = rand(0, 9);
		array_push($wordsPicked, $keyNumber);
		shuffle($wordsPicked);
		return $wordsPicked;
	}

	/* 
	 *	This is a function that adds a character to the array
	 *  @param: $wordsPicked
	 *  @return: $wordsPicked
	 */
	function addCharacter($wordsPicked)
	{
		// create an array for special character
		$specialCharacters = Array("#", "$", "&", "*", "@");

		// add a number to the words picked
		$specialCharacter = rand(0, count($specialCharacters) - 1);
		array_push($wordsPicked, $specialCharacters[$specialCharacter]);
		shuffle($wordsPicked);
		return $wordsPicked;

	}
	
	
?>

