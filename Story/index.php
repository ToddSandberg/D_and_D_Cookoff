<?php require_once("../CommonFunctions.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="../index.css">
</head>
<body>
	<?php
		generateHeader();
	?>
	<h5>Overview</h5>
	The story centers around a cooking tournament in the city of <?php createLink('Maps/', 'Newham') ?>.
	The tournament is entered as teams, most things assume the rules are a team of four but you could reason a smaller or larger team.
	The players can be called to action in any way, but the concept is that they are a team put together last minute.
	<br/>
	<b>Tourney Rules:</b>
	<ul>
		<li>Parties of four (can be fluffed)</li>
		<li>Cannot bring outside ingredients into the tournament. (Although players could sneak ingredients in)</li>
	</ul>
	<h5>What to do if players lose early</h5>
	An obvious problem with using a tournament style story is that if players are kicked out of the tournament early the entire campaign is scrapped.
	One way to get around this is to fluff that another team was disqualified. This can be due to bringing outside ingredients or any other reason.
	If the players get disqualified, getting knowledge of the judges could allow them to make a bribe. (TODO which judges would accept bribes)
	If the players dont want to get back into the touney good luck :)
	<h5>Individual Quests</h5>
	<?php
		displayDirectory();
	?>
</body>
</html>