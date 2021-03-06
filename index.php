<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/style.css" />
	<title>Portfolio</title>
</head>
<body>
	<div class="fluid-container">
		<nav class="main-nav transition">
			<a href="#home" class="logo transition scrollable hidden-sm hidden-xs">&lt;<span>DG</span> /&gt;</a>
			<button class="mobile-menu-toggle visible-sm visible-xs"><span class="glyphicon glyphicon-menu-hamburger"></span></button>
			<ul class="nav navbar-nav">
				<li><a href="#home">Homepage</a></li>
				<li><a href="#about">About</a></li>
				<li><a href="#skills">My Skills</a></li>
				<li><a href="#works">My work</a></li>
				<li><a href="#contact">Contact</a></li>
				<div class="clearfix"></div>
			</ul>
		</nav>
		<div class="page-layer page-layer-1" id="home">
			<ul class="scene">
				<li class="layer" data-depth="0.3">
					<div class="bg"></div>
				</li>
			</ul>
			<div class="center-block text-center home-block">
				<h2 class="main-head center-block layer-head" style="margin-bottom: 0;">Dominik Grzędzielski</h2>
				<h3 class="second-head center-block">Webdeveloper</h3>
			</div>
			<div class="center-block text-center" style="margin-top: 8em;">
				<a href="#about" class="arrow scrollable animate" data-anim="bounceIn"><span class="glyphicon glyphicon-arrow-down"></span></a>
			</div>
		</div>
		<div class="page-layer page-layer-2" id="about">
			<div class="center-block text-center" style="width: 50%;">
				<h2 class="layer-head">
					About
				</h2>
				<div class="about-content animate" data-anim="fadeInDown" style="animation-duration: 1s;">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi perferendis, velit nisi officiis sit ratione dignissimos sint beatae debitis accusantium consectetur et distinctio iusto praesentium blanditiis odio tenetur illum tempora. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta ullam fuga ab adipisci quam ipsam eligendi accusamus voluptatibus, enim optio eos odio asperiores voluptatem velit reiciendis quis quisquam nulla ducimus!
				</div>
				<div class="bubbles animate" data-anim="scaleIn">
					<h3>I LIKE</h3>
					<span class="glyphicon glyphicon-arrow-left bubble-control left" style="font-size: 3em; display: inline-block;"></span>
					<div class="bubble" style="display: inline-block;">
						<div class="bubble-content">
							<figure class="bubble-element" id="bubble-1">
								<img src="images/music.png" alt="music" />
								<figcaption>Music</figcaption>
							</figure>
							<figure class="bubble-element" id="bubble-2">
								<img src="images/football.png" alt="music" />
								<figcaption>Football</figcaption>
							</figure>
							<figure class="bubble-element" id="bubble-3">
								<img src="images/code.png" alt="music" />
								<figcaption>Webdev</figcaption>
							</figure>
							<figure class="bubble-element" id="bubble-4">
								<img src="images/girl.png" alt="music" />
								<figcaption>Girls</figcaption>
							</figure>
						</div>
					</div>
					<span class="glyphicon glyphicon-arrow-right bubble-control right" style="font-size: 3em; display: inline-block;"></span>
					<div class="bubble-description"></div>
				</div>
			</div>
		</div>

		<div class="page-layer page-layer-3" id="skills">
			<div class="center-block text-center">
				<h2 class="layer-head">
					My skills
				</h2>
				<div class="skills">
					<div class="skill html animate" style="width:95%;" data-anim="scaleInX"><span class="title">HTML</span><span class="value">95%</span></div>
					<div class="skill css animate" style="width: 95%;" data-anim="scaleInX"><span class="title">CSS</span><span class="value">95%</span></div>
					<div class="skill js animate" style="width: 75%;" data-anim="scaleInX"><span class="title">JavaScript</span><span class="value">75%</span></div>
					<div class="skill jquery animate" style="width: 70%;" data-anim="scaleInX"><span class="title">JQuery</span><span class="value">70%</span></div>
					<div class="skill php animate" style="width: 65%;" data-anim="scaleInX"><span class="title">PHP</span><span class="value">65%</span></div>
					<div class="skill symfony animate" style="width: 60%;" data-anim="scaleInX"><span class="title">Symfony</span><span class="value">60%</span></div>
				</div>
				
				<div class="ticks">
					<div class="tick">
						<img src="images/tick.png" alt="tick" />
						<span>Bootstrap</span>
					</div>
					<div class="tick">
						<img src="images/tick.png" alt="tick" />
						<span>SCSS/SASS</span>
					</div>
					<div class="tick">
						<img src="images/tick.png" alt="tick" />
						<span>RWD</span>
					</div>
				</div>
			</div>
		</div>
		<div class="page-layer page-layer-4" id="works">
			<div class="center-block text-center" style="display: flex; flex-flow: row wrap;">
				<a href="https://github.com/vettev" target="_blank" class="work animate" data-anim="bounceIn">
					<span>GitHub</span>
					<div class="img"><img src="images/git-light.png" /></div>
				</a>
				<a href="http://codepen.io/Vette" target="_blank" class="work animate" data-anim="bounceIn">
					<span>Codepen</span>
					<div class="img"><img src="images/codepen.png" /></div>
				</a>
			</div>
		</div>
		<div class="page-layer page-layer-5" id="contact">
			<div class="center-block form-contact" style="width: 70%;">
				<h2 class="layer-head text-center">
					CONTACT
				</h2>
				<form action="contact.php" method="post">
					<div class="input-block">
						<label for="i-name">Name</label>
						<input type="text" name="name" id="i-name" class="input-field" required="required" />
						<span class="active-line"></span>
					</div>
					<div class="input-block">
						<label for="i-email">Email</label>
						<input type="email" name="email" id="i-email" class="input-field" required="required" />
						<span class="active-line"></span>
					</div>
					<div class="input-block">
						<label for="i-title">Title</label>
						<input type="text" name="title" id="i-title" class="input-field" />
						<span class="active-line"></span>
					</div>
					<div class="input-block">
						<label for="i-content">Your Message</label>
						<textarea name="content" id="i-content" class="input-field" rows="5" required="required"></textarea>
						<span class="active-line"></span>
					</div>
					<div class="input-block text-center">
						<button type="submit" name="submit" class="i-submit">Send</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php 
		if(isset($_SESSION['message']))
		{
			echo '<script>alert("'.$_SESSION['message'].'")</script>'; 
			unset($_SESSION['message']);
		}
	?>
	<script src="js/jquery.min.js"></script>
	<script src="js/parallax.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	<script>$('.scene').parallax();</script>
</body>
</html>