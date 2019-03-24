<?php include PATH_VIEW . '/Website/Share/Header.php' ?>
<body>
    <link rel="stylesheet" href="<?= WEB_FOLDER ?>/public/css/directory.css">
	<header>
		<?php include PATH_VIEW . '/Website/Share/Navbar.php' ?>
	</header>
    <section>
		<div class="container-fluid">
			<?php foreach($directories as $d): ?>
				<div class="row">
					<div class="lession col-12 col-md-9 offset-md-1">
						<h1><?= $d->directory_name ?></h1>
						<div class="wrap">
							<h4>Bạn sẽ học được gì?</h4>

							<ol type="1" start="1">
								<?php foreach($d->goals as $goal): ?>
									<li><?= $goal->goal_content ?></li>
								<?php endforeach ?> 
							</ol>
							<h4>Bắt đầu các bài học ngay bây giờ</h4>

							<ul type="none">
								<?php foreach($d->lectures as $lecture): ?>
									<li><a href="<?= Link::lecture($d->course_name, $lecture->lecture_name, $lecture->lecture_id) ?>"><?= $lecture->lecture_name ?></a></li>
								<?php endforeach ?> 
							</ul>

						</div>
					</div>
				</div>
				
			<?php endforeach ?>
		</div>
	</section>
	
	<script type="text/javascript">
		var colors = ["red" ,"orange", "lightblue", "green", "pink", "lime", "yellow"]; 
		var lists = $( '.lession ul' ).each( function( index, ul ) {
			$(this).find('li').each( function(index, li) {
				$(this).css("border-left-color", colors[index%colors.length]);
			});
		});
	</script>

	<?php include PATH_VIEW . '/Website/Share/Footer.php' ?>
</body>
</html>