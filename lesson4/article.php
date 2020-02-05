<?php
if (!isset($_COOKIE['log']) || $_COOKIE['log'] == '') {
	header('Location: reg.php');
	exit();
}
$website_title="Добавление статьи";
require('blocks/header.php'); ?>
<main class="container mt-5">
	<div class="row">
		<div class="col-md-8 mb-3">
			<h4>Добавление статьи</h4>
			<form>
				<label for="title">Заголовок статьи</label>
				<input type="text" name="title" id="title" value="" class="form-control">
				<label for="intro">Интро статьи</label>
				<textarea name="intro"  id="intro" class="form-control"></textarea>
				<label for="text">Текст статьи</label>
				<textarea name="text"  id="text" class="form-control"></textarea>
				<div class="alert-danger mt-2" id="errorBlock"></div>
				<button type="button" class="btn btn-success mt-3" id="article_send" name="article_send">Добавить</button>
			</form>
		</div>
<?php require('blocks/aside.php'); ?>
	</div>
</main>
<script>
$('#article_send').click(function (){
	var title = $('#title').val();
	var intro = $('#intro').val();
	var text = $('#text').val();

	$.ajax({
		url: 'ajax/add_article.php',
		type: 'POST',
		cache: false,
		data: {'title' : title, 'intro' : intro, 'text':text},
		dataType: 'html',
		success: function (data) {
			if(data == 'Готово') {
				$('#article_send').text('Все готово');
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
