<?php include PATH_VIEW . '/Website/Share/Header.php' ?>
<body>
	<link rel="stylesheet" href="<?= WEB_FOLDER ?>/public/css/baihoc.css">
	<header>
		<?php include PATH_VIEW . '/Website/Share/Navbar.php' ?>
	</header>
	<main class="main">
		<div class="container-fluid pl-md-4 pt-2 pb-2">
			<div class="row align-items-start">
				<div class="p-1 col-3 d-none d-lg-block sidebar card">
					<div class="card-header"><h4>Danh sách bài học</h4></div>
					<div class="p-0 card-body">
						<ul type="square" class="p-0 menu">
						<?php foreach ($lectureList as $l): ?>
							<?php if ($l->lecture_id == $lecture->lecture_id): ?>
								<li id="js-active" class="pl-4 pr-4">
									<a href="<?= Link::lecture($course->course_name, $l->lecture_name, $l->lecture_id) ?>"><?= $l->lecture_name ?></a>
								</li>
							<?php else: ?>
								<li class="pl-4 pr-4">
									<a href="<?= Link::lecture($course->course_name, $l->lecture_name, $l->lecture_id) ?>"><?= $l->lecture_name ?></a>
								</li>
							<?php endif ?>
						<?php endforeach ?>
						</ul>
					</div>
				</div>
				<div class="col-12 col-lg-9">
					<div class="pl-md-2 pr-md-2 wrap">
						<div class="lecture-heading pl-4 pb-1 pt-4">
							<h2 class="lecture-title"><?= $lecture->lecture_name ?></h2>
							<p class="description">Đăng bởi: , vào ngày: 1-1-2011</p>
						</div>
						<div class="lecture p-3">
							<?= $lecture->lecture_data ?>
						</div>

						<div class="pt-1 pr-4 d-flex flex-row-reverse mt-2 pt-3 pb-4" style="border-top: 1px dashed #dedede">
							<a class="btn btn-info border-0" id="js-next">Bài kế tiếp</a>
							<a class="btn btn-info border-0 mr-2" id="js-prev">Bài Trước</a>
						</div>
					</div>

					<div class="cmt-box mt-3 p-4">
						<h3>Comments</h3>
						<div class="d-block mt-4" name="editor"></div>
						<div class="pt-3 pr-4 d-flex flex-row-reverse">
							<button class="btn btn-success border-0" id="js-post-cmt">Nhận xét</button>
							<button class="btn btn-info border-0 mr-2" id="js-clear-cmt">Hủy bỏ</button>
						</div>
						<hr>
						<div class="pl-lg-5" id="cmt-list"></div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<script type="text/javascript" src="<?= WEB_FOLDER . '/Public/Lib/ckeditor/ckeditor.js'?>"></script>
	<script type="text/javascript" src="<?= WEB_FOLDER . '/Public/js/config-cmt-editor.js'?>"></script>
	<script type="text/javascript">
		(function ($) {
			CKEDITOR.replace('editor', config);
			var ckeditor = CKEDITOR.instances.editor1;
			
			var id = $('#js-active').find('a').attr('href').replace(/.*?(\d+)[^\d]*$/, '$1');

			function loadComment() {
				var request = $.ajax({
					method: 'POST',
					url: '<?= WEB_FOLDER ?>/Comments/load',
					data: {'id': id}
				});

				request.done(function (data) {
					if (data.status === 1) {
						var cmtList = $('#cmt-list');
						cmtList.html(data.data.reduce( (innerHTML, cmt) => {
								var tag = '<div class="row mb-3"><img class="cmt-img" src="' + '<?= WEB_FOLDER ?>' +'/upload/users-img/' 
								+ cmt.user_image + '"><div class="cmt-i ml-4 col-9 offset-2"><h6 class="cmt-i-h6">' + 
								cmt.user_name + '</h6><p class="cmt-i-p">Time: '+ cmt.comment_date + '</p><div class="cmt">' + cmt.comment_content +'</div></div></div>';

								return innerHTML + tag;
							}, '')
						);
					} else {
						alert(data.message);
					}
				});

				request.fail(function (jqXHR, textStatus, errorThrown) {
					alert('Fail to load comment');
				});
			}

			loadComment();

			$('#js-clear-cmt').click(function() {
				ckeditor.setData();
			});
			
			$('#js-post-cmt').click(function() {
				var request = $.ajax({
					method: 'POST',
					url: '<?= WEB_FOLDER ?>/Comments/post',
					data: {
						'comment' : ckeditor.getData(),
						'id': id
					}
				});

				request.done(function (data) {
					alert(data.message);

					if (data.status === 1) {
						ckeditor.setData();
						loadComment();
					}
				});

				request.fail(function (jqXHR, textStatus, errorThrown) {
					alert('Fail to post comment');
				});
			});

			//Next và prev button
			var next = $('#js-active').next();
			if (next) {
				var href = next.find('a').attr('href');
				$('#js-next').attr('href', href);
			}

			var prev = $('#js-active').prev();
			if (prev) {
				var href = prev.find('a').attr('href');
				$('#js-prev').attr('href', href);
			}
		}(jQuery));
	</script>
	<?php include PATH_VIEW . '/Website/Share/Footer.php' ?>
</body>
</html>