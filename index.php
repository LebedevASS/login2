<!DOCTYPE html>
<html>
<head>
	<title>Регистрация и авторизация</title>
</head>
<body>
	<h1>Регистрация</h1>
	<form id="registration-form">
		<label for="username">Имя пользователя:</label>
		<input type="text" id="username" name="username"><br>

		<label for="password">Пароль:</label>
		<input type="password" id="password" name="password"><>

		<button type="submit">Зарегистрироваться</button>
	</form>

	<h1>Авторизация</h1>
	<form id="login-form">
		<label for="username">Имя пользователя:</label>
		<input type="text" id="username" name="username"><br>

		<label for="password">Пароль:</label>
		<input type="password" id="password" name="password"><>

		<button type="submit">Войти</button>
	</form>

	<script src="script.js"></script>
</body>
</html>