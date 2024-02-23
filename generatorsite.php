<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<title>GeneratorSite</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
	
	<div class = "w3-container w3-sand w3-padding">
		<div class="w3-container">
			<h1><strong>PHP 7 Exhibit: The Dynamic Site</strong></h1>
		</div>
		<?php
			
			/*
				cardGen:
				Description: A function that  generates web data depending on how many times it
				is called. The first call yields a basic description, the second a Lorem Ipsum
				paragraph, and the third, a list of corny knock-knock jokes.
				Parameters: None
				Returns: 
					Yield 1: An introduction page
					Yield 2: The Lorem Ipsum paragraph
					Yield 3: A list of bad knock-knock jokes
				Preconditions: None
				Postconditions: Also none
			*/
			$cardGen = (function()
			{
				#Yield an introductory paragraph
				yield '<div class= "w3-container w3-card-2 w3-padding w3-light-gray">
							<div class = w3-container><h2>Description:</h2></div>
							<div class = w3-container>
								<p>This simple website illustrates an example of using features added in PHP 7.0 to improve the functionality of websites.
								It is often common for the content of websites to differ depending on the user, and before PHP 7.0, these differences were mostly due to user cookies. With the introduction of generators, it is now possible for the content of the website itself to change depending on the user, which is what is being used here. What you are seeing right now is one of four different possible configurations that this website can assume. It can contain this evry introduction, a Lorem Ipsum paragraph, a list of corny jokes, or all of the former. The form at the bottom of this website allows you to request these configurations, and upon clicking Submit, the website will change depending on your selections. Try it out!
								</p>
							</div>
						</div>';
					
			
				#Yield the Lorem Ipsum page
				yield '<div class= "w3-container w3-card-2 w3-padding w3-white">
					   		<div class = w3-container><h2>Lorem Ipsum Dolor</h2></div>
							<div class = w3-container>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>
							</div>
					   </div>';
			
				#Return a list of corny jokes
				yield '<div class= "w3-container w3-card-2 w3-padding w3-pale-blue">
					   		<div class = w3-container><h2>Corny Jokes</h2></div>
							<div class = w3-container>
								<p>What do you call a cow with no legs? Ground beef!</p>
								<p>Wood fired pizza? How\'s pizza going to find a job now?</p>
								<p>Knock knock. Who\'s there? Knock Knock. Knock Knock who? I don\'t know Knock Knock. I was just knocking on the door.</p>
								<p>Have you heard of the kidnapping? He woke up</p>
								<p>Fly fishing? Fish don\'t fly, silly</p>
								<p>Shrimp fried rice? That shrimp must be a good chef</p>
								<p>Knock knock. Who\'s there? Joe. Joe who? Joe mama!!!</p>
								<p>Popcorn? When did corn become all the rage?</p>
								<p> Knock knock. Who\'s there. Punch. Punch who? Punchline</p>
								<p>What do you get when you cross a horse and a fly? A pest</p>
								<p>Why is six afraid of seven? Because seven ate nine!</p>
								<p>Why are fish so smart? Because they go to school</p>
								<p>Why is the clock hand always good at directions? Because it always moves right</p>
								<p>Why didn\'t the lion cross the road? To prove that he\'s no chicken.</p>
								<p>You know who else makes corny jokes? My mom!</p>
							</div>
					   </div>';
				return "";
			})();
	
		
	
			#First, check if the user posted anything, if not, just set userVal to 1
			$userVal = $_POST["userVal"] ?? 1;
			# Initialize a string value to represent what the website prints, named webStr.
			$webStr = "";
			#Then, branch to the corresponding case if its conditions are met.
			# Case 1: userVal < 4
			# Case 2: userVal == 4
			if($userVal < 4){
				# Case 1 is satisfied. In this case, use a for loop to iterate cardGen userVal times.
				# In each iteration, set webStr to the output of cardGen.
				$i = 0;
				
				foreach ($cardGen as $val) {
					$webStr = $val;
					$i++;
					if($i == $userVal){
						break;
					}
						
				}
			
			}else{
				# Case 2 is satisfied,, meaning that the user has requested for all web cards to be
				# displayed. In this case, iterate 3 times, and call cardGen in each iteration,
				# and concatenate webStr to the output of cardGen each time.
				foreach ($cardGen as $val) {
					$webStr .= $val;
				}
			}
			# Echo webStr to the screen.
			echo($webStr);
		?>
	
		<!---*/ Form goes here */---->
		<div class = "w3-container">
			<h3>Select the entry to appear on the Website:</h3>
			<form method = "post" action = "<?php echo $_SERVER['PHP_SELF'];?>">
				<div><input type = "radio" id = "desc" name = "userVal" value = 1>
					<label for= "desc">Website Description</label></div>
				<div><input type = "radio" id = "lorem" name = "userVal" value = 2>
					<label for= "lorem">Lorem Ipsum Paragraph</label></div>
				<div><input type = "radio" id = "badJokes" name = "userVal" value = 3>
					<label for= "badJokes">Bad Jokes</label></div>
				<div><input type = "radio" id = "allCards" name = "userVal" value = 4>
					<label for= "allCards">All of the Above</label></div>
				<input type = "submit"></form>
		
		</div>
	</div>
</body>
</html>
