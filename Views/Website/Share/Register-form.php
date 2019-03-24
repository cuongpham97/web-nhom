<form id="js-regist-form" method="POST">
	<div class="form-group">
		<label>Name</label><br>
		<select name="gender" class="form-control d-inline w-25">
			<option>Mr.</option>
			<option>Ms.</option>
			<option>Mrs.</option>
		</select>
		<input type="text" class="form-control d-inline w-50" name="name">
		<label id="js-name" style="color:red"></label>
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" class="form-control" name="email">
		<label id="js-email" style="color:red"></label>
	</div>
	<div class="form-group">
		<label>Phone</label>
		<input type="text" class="form-control" name="phone">
		<label id="js-phone" style="color:red"></label>
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" class="form-control" name="password" autocomplete="off">
		<label id="js-password" style="color:red"></label>
	</div>
	<div class="form-group">
		<a href="#" class="--color-blue" id="js-clear">Clear input</a><br/><br/>
		<input type="submit" class="btn --bg-blue --color-white w-100" value="SIGN UP">
	</div>
</form>

<script>
	(function ($) {
		var registerForm = (function() {
			var form = $('#js-regist-form');
			var clearInputTag = form.find('#js-clear');
			var errorTag = {
				name: form.find('#js-name'),
				email: form.find('#js-email'),
				phone: form.find('#js-phone'),
				password: form.find('#js-password')
			};

			var clearError = function (){
				for (tag in errorTag) {
					errorTag[tag].html('');
				}
			}

			clearInputTag.click(function (){
				form.trigger('reset');
				clearError();
			});

			form.submit(function (event) {
				event.preventDefault();
				clearError();

				var request = $.ajax({
					method: 'POST',
					url: '<?= WEB_FOLDER ?>/Accounts/register',
					data: $(this).serialize()
				});

				request.done(function (data) {
					alert(data.message);
					for (error in data.data) {
						if (error != 'gender') {
							errorTag[error].html(data.data[error]);
						} 
					}
				});

				request.fail(function (jqXHR, textStatus, errorThrown) {
					alert('Request fail');
				});
			});
		}());
	})(jQuery);
</script>