<form enctype="multipart/form-data" method="post" id="feedback-form">
	<label for="nameFF">Имя:</label>
	<input type="text" name="nameFF" id="nameFF" required placeholder="например, Иван Иванович Иванов" x-autocompletetype="name" class="w100 border">
	
	<label for="contactFF">Email:</label>
	<input type="email" name="contactFF" id="contactFF" required placeholder="например, ivan@yandex.ru" x-autocompletetype="email" class="w100 border">
	
	<label for="fileFF">Прикрепить файл:</label>
	<input type="file" name="fileFF[]" multiple id="fileFF" class="w100">
	
	<label for="messageFF">Сообщение:</label>
	<textarea name="messageFF" id="messageFF" required rows="5" placeholder="Детали заявки…" class="w100 border"></textarea>
	<br>
	<input value="Отправить" type="submit" id="submitFF">
</form>