<?php include PATH_VIEW . '/Website/Share/Header.php' ?>
<body>
	<link rel="stylesheet" href="<?= WEB_FOLDER ?>/public/css/home.css">
	<header>
		<?php include PATH_VIEW . '/Website/Share/Navbar.php' ?>
	</header>

	<section>
		<div class="pagetop-content row">
			<div class="col-12 offset-0 col-md-6 offset-md-5 text-center">
				<div class="wrap">
					<div class="para-1">
						<p>How to finally succeed with your blog:</p>
					</div>
					<hr size="5px" color="#686868" align="center" noshade="noshade"/>
					<div class="para-2">
						<p>THE PROVEN STRATEGIES</p>
						<p>THAT WORKED FOR ME &amp; WILL WORK</p>
						<p>FOR YOU IN AS LITTLE</p>
						<p>AS 30 DAYS!</p>
					</div>
					<div class="para-3">
						<a href="#"><button class="btn btn-outline-primary">GET MINE NOW</button></a>
					</div>
				</div>
			</div>
		</div>

		<div class="courses d-flex flex-row flex-wrap align-content-center">
			<?php foreach ($courses as $course): ?>
				<div class="course text-center">
					<a href="<?= Link::course($course->course_name, $course->course_id) ?>">
						<img src="<?= WEB_FOLDER . '/upload/courses-img/' . $course->course_image ?>"/>
					</a>
					<h5 class="text-uppercase"><b><?= $course->course_name ?></b></h5>
				</div>
			<?php endforeach ?>
		</div>

		<div class="bottom-content">
			<div class="row text-center">
				<div class="col-12">
					<p>GET THE STRATEGY TO TAKE YOUR BLOG TO CONSISTENT &#36;1K</p>
					<p>MONTHS WITH YOUR FREE 5 STEP BLUEPRINT TO YOUR FIRST</p>
					<p>&#36;1K FROM BLOGGING</p>
					<button class="btn btn-success">SEND ME THE GUIDE</button>
				</div>
			</div>

			<div class="row">
				<div class="col-8 col-md-6 m-auto">
					<div class="search-box">
						<input type="text" placeholder="Search..."/>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="m-auto">
					<ul class="contact">
						<li><a href=""><i class="fab fa-facebook"></i></a></li>
						<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
						<li><a href=""><i class="fab fa-twitter"></i></a></li>
						<li><a href=""><i class="fab fa-pinterest"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<?php include PATH_VIEW . '/Website/Share/Footer.php' ?>
</body>
</html>