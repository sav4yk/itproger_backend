<?php
$website_title="Авторизация";
 require('blocks/header.php'); ?>
<main class="container mt-5">
	<div class="row">
		<div class="col-md-8 mb-3">
			<h4>Форма авторизации</h4>
			<?php
			if (!isset($_COOKIE['log']) || $_COOKIE['log'] == '') :
			 ?>
			<form>
				<label for="login">Логин</label>
				<input type="text" name="login" id="login" value="" class="form-control">
				<label for="pass">Пароль</label>
				<input type="password" name="pass" id="pass" value="" class="form-control">
				<div class="alert-danger mt-2" id="errorBlock"></div>
				<button type="button" class="btn btn-success mt-3" id="auth_user" name="auth_user">Войти</button>
			</form>
		<?php else: ?>
			<h2><?=$_COOKIE['log']; ?></h2>
			<button class="btn btn-danger" id="exit_button">Выйти</button>
		<?php endif; ?>
		</div>
<?php require('blocks/aside.php'); ?>
	</div>
</main>
<script>
$('#auth_user').click(function (){
	var login = $('#login').val();
	var pass = $('#pass').val();

	$.ajax({
		url: 'ajax/auth.php',
		type: 'POST',
		cache: false,
		data: {'login':login, 'pass':pass},
		dataType: 'html',
		success: function (data) {
			if(data == 'Готово') {
				$('#auth_user').text('Все готово');
				$('#errorBlock').hide();
				document.location.reload(true);
			}
			else {
				$('#errorBlock').show();
				$('#errorBlock').text(data);
			}
		}
	});
});

$('#exit_button').click(function (){
	$.ajax({
		url: 'ajax/exit.php',
		type: 'POST',
		cache: false,
		data: {},
		dataType: 'html',
		success: function (data) {
				document.location.reload(true);
		}
	});
});
</script>
<?php require('blocks/footer.php'); ?>
