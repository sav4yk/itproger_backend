<aside class="col-md-4">
	<div class="p-3 mb-3 bg-warning rounded">
		<h4><b>Интересные факты</b></h4>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div>
	<div class="p-3 mb-3">
		<img src="https://itproger.com/img/courses/1550320843.jpg" alt="" class="img-thumbnail">
	</div>
	<div class="p-3 mb-3">
		<div id="chat">

		</div>
		<form>
		<input type="text" name="chat_mess" id="chat_mess" value="" class="form-control" placeholder="Сообщение">
		<div class="alert-danger mt-2" id="errorBlock"></div>
		<button type="button" class="btn btn-success mt-3" id="send_mess_to_chat" name="send_mess_to_chat">Отправить</button>
		<script>
		function chat_load_3_seconds () { //функция автозагрузки сообщений чата
			$.ajax({
				url: 'ajax/chat_load.php',
				type: 'POST',
				cache: false,
				data: {},
				dataType: 'html',
				success: function (data) {
					if($.trim(data)) {
						$('#chat').html(data);
					}
				}
			});
		}

		chat_load_3_seconds(); //загружаем при загрузке страницы

		setInterval(function() {chat_load_3_seconds() }, 3000); //ставим таймер на функцию выше каждые 3 секунды
		$('#send_mess_to_chat').click(function (){
			var chat_mess = $('#chat_mess').val();
			$('#chat_mess').val("");
			$.ajax({
				url: 'ajax/chat.php',
				type: 'POST',
				cache: false,
				data: {'mess' : chat_mess},
				dataType: 'html',
				success: function (data) {
					if(data == 'Готово') {
						if ($('#chat').html().indexOf("Пока сообщений еще нет") >= 0) { $('#chat').html(""); } //если сообщений еще не было -> удаляем "пустой" див
						$('#chat').prepend("<div class='alert alert-info mb-2'>" + chat_mess + "</div");
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
	</div>
</aside>
