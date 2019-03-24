<form id="js-login-form" method="POST">
	<div class="form-group">
		<label>Email</label>
		<input type="email" class="form-control" name="email">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" class="form-control" name="password" autocomplete="off">
		<label id="js-login-error" style="color:red"></label>
	</div>
	<div class="form-group">
		<input type="checkbox" class="form-comtrol ml-4" name="remember">
		<label>Remember me</label>
		<a href="javascript:;" class="--color-blue float-right mb-2 ml-4">Forgot your password?</a>
	</div>
	<div class="form-group">
		<input type="submit" class="btn --bg-blue --color-white w-100" value="SIGN IN">
	</div>
</form>

<script>
	(function ($){
		var loginForm = (function() {
			var form = $('#js-login-form');
			var errorTag = form.find('#js-login-error');

			form.submit(function (event) {
				event.preventDefault();

				var request = $.ajax({
					method: 'POST',
					url: '<?= WEB_FOLDER ?>/Accounts/login',
					data: $(this).serialize()
				});

				request.done(function (data) {
					errorTag.html(data.message);

					if (data.status === 1){
						navbar.closeForm();
						navbar.setLogin(data.data.user, data.data.image);
					}
				});

				request.fail(function (jqXHR, textStatus, errorThrown) {
					alert('Request fail');
				});
			});
		}());

		var navbar = {
			closeButton: $('#js-close'),
			loginButton: $('#js-show-login'),
			logoutButton: $('#js-logout'),
			loginImage:	$('#js-login-img'),

			closeForm: function() {
				this.closeButton.click();
			},

			setLogin(username, image){
				this.loginImage.attr('src', '<?= WEB_FOLDER ?>/Upload/users-img/' + image);
				this.loginButton.removeClass('d-block');
				this.loginButton.addClass('d-none');
				this.logoutButton.removeClass('d-none');
				this.logoutButton.addClass('d-block');
			}
		}

	})(jQuery);
</script>