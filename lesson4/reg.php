<?php
$website_title="Регистрация";
 require('blocks/header.php'); ?>
<main class="container mt-5">
	<div class="row">
		<div class="col-md-8 mb-3">
			<h4>Форма регистрации</h4>
			<form>
				<label for="username">Ваше имя</label>
				<input type="text" name="username" id="username" value="" class="form-control">
				<label for="email">Email</label>
				<input type="email" name="email" id="email" value="" class="form-control">
				<label for="login">Логин</label>
				<input type="text" name="login" id="login" value="" class="form-control">
				<label for="pass">Пароль</label>
				<input type="password" name="pass" id="pass" value="" class="form-control">
				<div class="alert-danger mt-2" id="errorBlock"></div>
				<button type="button" class="btn btn-success mt-3" id="reg_user" name="reg_user">Зарегистрироваться</button>
			</form>
		</div>
<?php require('blocks/aside.php'); ?>
	</div>
</main>
<script>
$('#reg_user').click(function (){
	var name = $('#username').val();
	var email = $('#email').val();
	var login = $('#login').val();
	var pass = $('#pass').val();

	$.ajax({
		url: 'reg/reg.php',
		type: 'POST',
		cache: false,
		data: {'username' : name, 'email' : email, 'login':login, 'pass':pass},
		dataType: 'html',
		success: function (data) {
			if(data == 'Готово') {
				$('#reg_user').text('Все готово');
				$('#errorBlock').hide();
			}
			else {
				$('#errorBlock').show();
				$('#errorBlock').text(data);
			}
		}
	});
});
</script>
<?php require('blocks/footer.php'); ?>
