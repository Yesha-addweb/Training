<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<body>

		<?php
			$txt = "Hello world!";
			$x = 5;
			$y = 10.5;

			echo "=> Simple Program in which hello world and integer is display:-";
			echo "<br>";
			echo $txt;
			echo "<br>";
			echo $x;
			echo "<br>";
			echo $y;
			echo "<br>";

			echo "<br>";
			echo "=> Simple Program in which the integer is show:-";
			$a = 5985;
			var_dump($a);
			echo "<br>";

			echo "<br>";
			echo "=> Simple Program of array:-";
			$fruit = array('Mango', 'banana', 'kiwi' );
			var_dump($fruit);

			echo "<br>";
			echo "=> Get Length of a string:-";
			echo "<br>";
			echo strlen("HELLO WORLD!");
			echo "<br>";


			echo "<br>";
			echo "=> Count The Number of Words in a String:-";
			echo "<br>";
			echo str_word_count("Hello world!"); 
			echo "<br>";

			
			echo "<br>";
			echo "=> Reverse word:-";
			echo "<br>";
			echo strrev("Hello world!"); 
			echo "<br>";
			

			echo "<br>";
			echo "=> Search For a Specific Text Within a String:-";
			echo "<br>";
			echo strpos("Hello Yesha and Dharati!", "and"); 
			echo "<br>";


			echo "<br>";
			echo "=> Replace Text Within a String:-";
			echo "<br>";
			echo str_replace("Yesha", "Dharati", "Hello Yesha"); 
			echo "<br>";


			echo "<br>";
			echo "=> Operators:-";
			echo "<br>";
			$b = 12;
			$c = 2;
			echo "Addition:-";
			echo $b + $c;
			echo "<br>";
			echo "Subtraction:-";
			echo $b - $c;
			echo "<br>";
			echo "Multiplication:-";
			echo $b * $c;
			echo "<br>";
			echo "Division:-";
			echo $b / $c;
			echo "<br>";
			echo "Modulo:-";
			echo $b % $c;
			echo "<br>";

			echo "<br>";
			echo "=> Read the file which is out of the program which is external file:-";
			echo "<br>";
			echo "<br>";
			echo readfile("../overviewofphp.txt");
			echo "<br>";
			echo "<br>";
		?>
		
		<?php
			$_SESSION["favcolor"] = "blue";
			$_SESSION["favanimal"] = "Dog";
			echo "Session variables are set.";
			echo "<br>";
		?>

		<?php
		echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
		echo "Favorite animal is " . $_SESSION["favanimal"] . ".";
		echo "<br>";
		?>

		<?php
		echo "<br>";
		class customException extends Exception {
		  public function errorMessage() {
		    //error message
		    $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
		    .': <b>'.$this->getMessage().'</b> is not a valid E-Mail address';
		    return $errorMsg;
		  }
		}

		$email = "someone@example...com";

		try {
		  //check if
		  if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
		    //throw exception if email is not valid
		    throw new customException($email);
		  }
		}

		catch (customException $e) {
		  //display custom message
		  echo $e->errorMessage();
		}
		?>
	</body>
</html>