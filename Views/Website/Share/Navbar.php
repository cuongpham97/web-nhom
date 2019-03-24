<nav class="navbar navbar-expand-md fixed-top navbar-light navbar navbar-custome">

	<a class="navbar-brand" href="<?= WEB_FOLDER ?>/home"><img src="<?= WEB_FOLDER ?>/public/img/logo.png" width="100%" height="100%"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="collapsibleNavbar">
		<ul class="navbar-nav flex-wrap ml-auto">
			<?php foreach($menu as $item) : ?>
				<?php if (empty($item->childs)): ?>
					<li class="nav-item">
						<a class="nav-link" href="<?= WEB_FOLDER . "$item->menu_link" ?>"><?= $item->menu_name ?></a>
					</li>
			  	<?php else: ?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle"  id="navbardrop" data-toggle="dropdown"><?= $item->menu_name ?></a>
						<div class="dropdown-menu">
							<?php  foreach ($item->childs as $submenu): ?>
								<a class="dropdown-item" href="<?= WEB_FOLDER . "$submenu->submenu_link" ?>"><?= $submenu->submenu_name ?></a>
							<?php endforeach ?>
						</div>
					</li>
				<?php endif ?>
			<?php endforeach ?>

			<li class="nav-item">  
				<a class="nav-link <?= empty($user) ? 'd-block' : 'd-none' ?>" id="js-show-login" href="#"  style="color:#28a745" data-toggle="modal" data-target="#modal-login">Login</a>
				<a class="nav-link <?= empty($user) ? 'd-none' : 'd-block' ?>" id="js-logout" href="<?= WEB_FOLDER ?>/accounts/logout" style="color:#28a745">
					<img id="js-login-img" class="login-img" src="<?= empty($user) ? '' : WEB_FOLDER . '/upload/users-img/' . $user->image ?>">/Log out
				</a>
			</li>
		</ul>
	</div> 
</nav>

<!--modal để hiển thị form đăng nhập và đăng kí-->
<div class="modal fade" id="modal-login" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			
			<div class="text-center">
				<a id="js-close" class="close mr-2" data-dismiss="modal" aria-hidden="true">x</a>
			</div>

			<div class="modal-body row pt-0">
				<div class="col-12 col-lg-8" style="border-right: 1px dotted #911719; padding-right: 30px;">
					<!-- navbar -->
					<ul class="nav nav-tabs text-center">
						<li class="nav-item w-50">
							<a class="nav-link --color-grey active" data-toggle="tab" href="#tab-login" role="tab">Login</a>
						</li>
						<li class="nav-item w-50">
							<a class="nav-link --color-grey" data-toggle="tab" href="#tab-registration" role="tab">Registration</a>
						</li>
					</ul>
					
					<!-- content -->
					<div class="tab-content p-3">
						<!-- tab-login -->
						<div class="tab-pane show active" role="tabpanel" id="tab-login">
							<?php include PATH_VIEW . '/Website/Share/Login-form.php' ?>
						</div>

						<!-- tab-registration -->
						<div class="tab-pane" id="tab-registration" role="tabpanel">
							<?php include PATH_VIEW .'/Website/Share/Register-form.php' ?>
						</div>

					</div> <!-- /tab-content -->
					<div id="OR" class="d-none d-lg-block">OR</div>
				</div>

				<div class="col-12 col-lg-4 m-lg-auto pb-5">
					<h5 class="text-center">Sign in with</h5>
					<div class="btn-group w-75 d-block m-auto">
						<a href="#" class="btn btn-primary w-50">Facebook</a><a href="#" class="btn btn-danger w-50">Google</a>
					</div>
				</div>

			</div> <!-- /modal-body -->
		</div> <!-- /modal-content -->
	</div>
</div>