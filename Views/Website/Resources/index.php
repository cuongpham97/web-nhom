<?php include PATH_VIEW . '/Website/Share/Header.php' ?>
<body>
	<link rel="stylesheet" href="<?= WEB_FOLDER . '/public/css/resources.css' ?>">
	<header>
		<?php include PATH_VIEW . '/Website/Share/Navbar.php' ?>
	</header>

	<section>
		<div class="pagetop-content row">
			<div class="col-12 offset-0 col-md-7">
				<div class="wrap">
					<div class="para-1 pl-5">Làm thế nào để học web tốt hơn?</div>
					<hr size="8px" class="ml-5"/>
					<div class="para-2">Website blog sẽ giúp bạn làm web một cách đơn giản nhất !</br>Hãy kéo xuống để xem các bài học nhé !</div>
				</div>
			</div>
		</div>

		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h4><i>Tại đây các bạn có thể download các phần mềm, công cụ, tài nguyên cho các dự án của mình</i></h4>
					</div>
				</div>
					
				<?php foreach($resources as $resource): ?>				
					<div class="row">
						<div class="col-12">
							<h3><?= $resource->resource_name ?></h3>
							<table class="table table-hover table-bordered">
								<thead></thead>
									<tbody>
										<?php foreach($resource->links as $link): ?>
											<tr>
												<td><?= $link->link_name ?></td>
												<td><a href="<?= WEB_FOLDER . $link->link_link ?>">Download</a></td>
											</tr>
										<?php endforeach ?>
									</tbody>
							</table>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>	
	</section>
	
	<?php include PATH_VIEW . '/Website/Share/Footer.php' ?>
</body>
</html>