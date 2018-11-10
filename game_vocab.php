<?php
include_once 'dbconnect.php';

$a=(mt_rand(1,334));
$sql = "SELECT * FROM vocab WHERE vocab_index ='$a'";
$result_1 = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result_1,MYSQLI_ASSOC))
{
   $name = $row["vocab_word"];
   $s = $row["vocab_score"];
   $defn = $row["vocab_def"];
}
?>

<!doctype html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css_vocab.css">
		<title>HANGMAN</title>
	</head>
<body>
<script src="mousetrap.js"></script>
<button class="button" id="STARTANIMATE" onclick="start();">START</button>
<button class="button" id="RESTART" onclick="restart();">RESTART</button>
<br/>
<p id="wordgoeshere">click START or shift+ctrl+s</p>
<div id="line1">
<div><button class="button" id="Q" onclick="letterpress('Q')">Q</button></div>
<div><button class="button" id="W" onclick="letterpress('W')">W</button></div>
<div><button class="button" id="E" onclick="letterpress('E')">E</button></div>
<div><button class="button" id="R" onclick="letterpress('R')">R</button></div>
<div><button class="button" id="T" onclick="letterpress('T')">T</button></div>
<div><button class="button" id="Y" onclick="letterpress('Y')">Y</button></div>
<div><button class="button" id="U" onclick="letterpress('U')">U</button></div>
<div><button class="button" id="I" onclick="letterpress('I')">I</button></div>
<div><button class="button" id="O" onclick="letterpress('O')">O</button></div>
<div><button class="button" id="P" onclick="letterpress('P')">P</button></div>
</div>
<div id="line2">
<div><button class="button" id="A" onclick="letterpress('A')">A</button></div>
<div><button class="button" id="S" onclick="letterpress('S')">S</button></div>
<div><button class="button" id="D" onclick="letterpress('D')">D</button></div>
<div><button class="button" id="F" onclick="letterpress('F')">F</button></div>
<div><button class="button" id="G" onclick="letterpress('G')">G</button></div>
<div><button class="button" id="H" onclick="letterpress('H')">H</button></div>
<div><button class="button" id="J" onclick="letterpress('J')">J</button></div>
<div><button class="button" id="K" onclick="letterpress('K')">K</button></div>
<div><button class="button" id="L" onclick="letterpress('L')">L</button></div>
</div>
<div id="line3">
<div><button class="button" id="Z" onclick="letterpress('Z')">Z</button></div>
<div><button class="button" id="X" onclick="letterpress('X')">X</button></div>
<div><button class="button" id="C" onclick="letterpress('C')">C</button></div>
<div><button class="button" id="V" onclick="letterpress('V')">V</button></div>
<div><button class="button" id="B" onclick="letterpress('B')">B</button></div>
<div><button class="button" id="N" onclick="letterpress('N')">N</button></div>
<div><button class="button" id="M" onclick="letterpress('M')">M</button></div>
</div>
<div id="pageinfo">
	<p id="vocabword"></p>
	<p id="defn"></p>
	<p id="linkk"></p>
</div>
<div id="scoreboard">
<p id="wrongcountgoes"></p>
<p id="yougotitright"></p>
</div>


<script>

var word = "<?php echo $name; ?>";
var score = "<?php echo $s; ?>";
word = word.toUpperCase();
var warr = word.split("");
var wordshow = '';
var wrong_letters = [];
var wrong_count = 0;
var len = word.length;
var started = false;
var wronged = false;
var ended = false;
for(var i = 0; i < len; i++)
	{
		if(warr[i] == ' ')
		{
			wordshow = wordshow + ' ';
			i++;
		}
		if(warr[i] == '-')
		{
			wordshow = wordshow + '-';
			i++;
		}
		wordshow = wordshow + '_';
	}
var warrshow = wordshow.split("");


Mousetrap.bind('a', function(){letterpress('A');});
Mousetrap.bind('b', function(){letterpress('B');});
Mousetrap.bind('c', function(){letterpress('C');});
Mousetrap.bind('d', function(){letterpress('D');});
Mousetrap.bind('e', function(){letterpress('E');});
Mousetrap.bind('f', function(){letterpress('F');});
Mousetrap.bind('g', function(){letterpress('G');});
Mousetrap.bind('h', function(){letterpress('H');});
Mousetrap.bind('i', function(){letterpress('I');});
Mousetrap.bind('j', function(){letterpress('J');});
Mousetrap.bind('k', function(){letterpress('K');});
Mousetrap.bind('l', function(){letterpress('L');});
Mousetrap.bind('m', function(){letterpress('M');});
Mousetrap.bind('n', function(){letterpress('N');});
Mousetrap.bind('o', function(){letterpress('O');});
Mousetrap.bind('p', function(){letterpress('P');});
Mousetrap.bind('q', function(){letterpress('Q');});
Mousetrap.bind('r', function(){letterpress('R');});
Mousetrap.bind('s', function(){letterpress('S');});
Mousetrap.bind('t', function(){letterpress('T');});
Mousetrap.bind('u', function(){letterpress('U');});
Mousetrap.bind('v', function(){letterpress('V');});
Mousetrap.bind('w', function(){letterpress('W');});
Mousetrap.bind('x', function(){letterpress('X');});
Mousetrap.bind('y', function(){letterpress('Y');});
Mousetrap.bind('z', function(){letterpress('Z');});
Mousetrap.bind('ctrl+shift+s',function(){start();});
Mousetrap.bind('ctrl+shift+a',function(){restart();});

function restart()
{
	if(started && ended)
	window.location.reload();
}

function colorchange(key,colorname)
{
	var elementname = document.getElementById(key);
	elementname.style.backgroundColor = colorname;
}

function start()
{
	document.getElementById("wordgoeshere").innerHTML = warrshow.join("");
	document.getElementById("STARTANIMATE").id = "START";
	document.getElementById("defn").innerHTML = 
	"<?php echo $defn;?>";
	started = true;
}

function showinfo()
{
	document.getElementById("vocabword").innerHTML = 
	"<h1><?php echo $name;?></h1>";
	document.getElementById("defn").innerHTML = 
	"<?php echo $defn;?>";
	document.getElementById("linkk").innerHTML =
	'<a href="http://www.dictionary.com/browse/<?php echo $name;?>">dictionary.com page</a>';
}

function letterpress(key)
{if(started && !ended){
	
	if(word.indexOf(key) == -1 && wrong_letters.indexOf(key) == -1)
		{
			wrong_count = wrong_count + 1;
			wrong_letters.push(key);
			wronged = true;
			document.getElementById("wrongcountgoes").innerHTML = (7-wrong_count) + " attempts remain. Choose Wisely.";
			colorchange(key,'rgba(217,29,19,0.5)');
		}	
	else {for(i = 0; i < word.length; i++)
	{
		if(key == word[i])
			{
				warrshow[i] = key;
				colorchange(key,'rgba(147,199,99,0.5)');
			}
	}
	document.getElementById("wordgoeshere").innerHTML = warrshow.join("");}
	
	if(warrshow.join("") === word)
	{
		if(wronged){document.getElementById("yougotitright").innerHTML = "You Chose Wisely. You scored " + score + ".";
		document.getElementById("wrongcountgoes").innerHTML = "";}
		else{
		document.getElementById("yougotitright").innerHTML = "No Mistakes! You scored " + score + ".";
		}
		showinfo();
		ended = true;
		document.getElementById("RESTART").innerHTML = "CONTINUE";
		document.getElementById("RESTART").id = "RESTARTANIMATE";
		return;	
	}
	
	if(wrong_count >= 7)
		{
			document.getElementById("wrongcountgoes").innerHTML = "Oh no! The word was " + word;
			ended = true;
			return;
		}
}
}

</script>
</body>
</html>