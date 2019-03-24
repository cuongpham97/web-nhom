<?php include PATH_VIEW . '/Website/Share/Header.php' ?>
<body>
	<link rel="stylesheet" href="<?= WEB_FOLDER . '/public/css/overview.css' ?>">
	<header>
		<?php include PATH_VIEW . '/Website/Share/Navbar.php' ?>
	</header>

	<section>
		<div class="pagetop-content row">
			<div class="col-12 offset-0 col-md-7">
				<div class="wrap">
					<div class="para-1 pl-5">Làm thế nào để học web tốt hơn?</div>
					<hr size="8px" class="ml-5"/>
					<div class="para-2">Website blog sẽ giúp bạn làm web một cách đơn giản nhất !<br>Hãy kéo xuống để xem các bài học nhé !</div>
				</div>
			</div>
		</div>

		<?php for($i = 0; $i < count($des); $i++): ?>
			<?php if ($i % 2 == 0): ?>
				<div class="bg-trang p-3">
					<div class="col-12 offset-0 offset-md-2 col-md-10">
                        <div class="row">
                            <div class="title pt-4">
                                <?= empty($des[$i]->course_alias) ? $des[$i]->course_name : $des[$i]->course_alias ?>
                            </div>

                            <div class="title1 pt-5 mt-3 ml-1">
								<?php if(isset($des[$i]->description_title)) echo $des[$i]->description_title ?>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="row">
                        <div class="col-12 offset-0 offset-md-2 col-md-4 ">
                            <div class="row container ">
                                <div class="col1 pl-1">
                                    <?= $des[$i]->description_detail ?>
                                    <div class="button p-1 py-2">
										<a class="btn btn-default bnt-bt" href="<?= Link::course($des[$i]->course_name, $des[$i]->course_id) ?>" style="text-decoration: none">
										 Học <?= empty($des[$i]->course_alias) ? $des[$i]->course_name : $des[$i]->course_alias ?>
										</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 pb-2">
                            <div class="rounded bg0 ">
                                <div class="tieude py-4 pl-3"><?= 'Ví dụ: ' . $des[$i]->course_name ?></div>
                                <div class="border-left  bg">
                                    <div class="example">
                                        <img src="<?= WEB_FOLDER . '/upload/overview-img/' . $des[$i]->description_image ?>">
                                    </div>
                                </div>
                                <div class="btn btn-default bnt-bt my-3 mx-3">
                                    <a href="exam_html.html" style="text-decoration: none"  class="text-light">Kết quả</a>
                                </div>
                            </div>
                        </div>
                    </div>
					
				</div>
			<?php else: ?>
				<div class="bg-trang p-3">
					<div class="col-12 offset-0 offset-md-2 col-md-10 ">
						<div class="row">
							<div class="title pt-4">
								<?= empty($des[$i]->course_alias) ? $des[$i]->course_name : $des[$i]->course_alias ?>
							</div>
							<div class="title1 pt-5 mt-3 ml-1">
								<?php if(isset($des[$i]->description_title)) echo $des[$i]->description_title ?>
							</div>
						</div>
						<hr>
					</div>

					<div class="row">
						<div class="col-12 offset-0 offset-md-2 col-md-4 pb-2">
							<div class="rounded bg0 ">
								<div class="tieude py-4 pl-3"><?= 'Ví dụ: ' . $des[$i]->course_name ?></div>
								<div class="border-left  bg">
									<div class="example">
										<img src="<?= WEB_FOLDER . '/upload/overview-img/' .$des[$i]->description_image ?>" width="303px" height="250px">
									</div>
								</div>
								<div class="btn btn-default bnt-bt my-3 mx-3">
									<a href="exam_html.html" style="text-decoration: none"  class="text-light">Kết quả</a>
								</div>
							</div>
						</div>

						<div class=" col-md-4  ">
							<div class="row container">
								<div class="col1  pl-1">
									<?= $des[$i]->description_detail ?>
									<div class="button p-1 py-2">
										<a class="btn btn-default bnt-bt" href="<?= Link::course($des[$i]->course_name, $des[$i]->course_id) ?>" style="text-decoration: none">
										 Học <?= empty($des[$i]->course_alias) ? $des[$i]->course_name : $des[$i]->course_alias ?>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endif ?>
		<?php endfor ?>

		<script type="text/javascript">
			var lists = $( '.bg-trang' ).each( function( index, div ) {
				$(this).addClass('bg' + (index%5 + 1));
			});
		</script>
	</section>
	
	<?php include PATH_VIEW . '/Website/Share/Footer.php' ?>
</body>