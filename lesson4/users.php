<?php
$website_title="Все пользователи";
 require('blocks/header.php'); ?>
<main class="container mt-5">
	<div class="row">
		<div class="col-md-8 mb-3">
			<h4>Список пользователей</h4>
			<?php
			if (!isset($_COOKIE['log']) || $_COOKIE['log'] == '') :
			 ?>
			<h2>Список пользователей виден только после авторизации</h2>
		<?php else: ?>

			<?php
			require_once 'mysql_connect.php';
			$query = $pdo -> query('SELECT `id`, `login`, `name` FROM `users`');
			while($row = $query->fetch(PDO::FETCH_OBJ)) { // вывод как объект
				?>
				<div class="row">
					<div class="col-12 col-sm-12 text-secondary m-1 p-1 rounded border border-info" style="background: #D1ECF1;">
						<?= '<b>Имя:</b> '.$row->name.', <b>логин:</b> '.$row->login;?>
						<button class="btn btn-danger del_user" user="<?=$row->id; ?>">Удалить</button>
					</div>
				</div>

			<?php }
			 ?>



		<?php endif; ?>
		</div>
<?php require('blocks/aside.php'); ?>
	</div>
</main>
<script>
$('.del_user').click(function (){
	var id = $(this).attr('user');
	var p = $(this).parent();

	$.ajax({
		url: 'ajax/del.php',
		type: 'POST',
		cache: false,
		data: {'id':id},
		dataType: 'html',
		success: function (data) {
			if(data == 'Готово') {
				p.hide();

			}
		}
	});
});
</script>
<?php require('blocks/footer.php'); ?>
