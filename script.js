// Обработчик события отправки формы регистрации
document.getElementById("registration-form").addEventListener("submit", function(event) {
	event.preventDefault(); // Отменяем действие по умолчанию

	// Получаем значения полей формы
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;

	// Создаем объект с данными для отправки на сервер
	var data = {
		"action": "register",
		"username": username,
		"password": password
	};

	// Отправляем данные на сервер
	sendData(data);
});

// Обработчик события отправки формы авторизации
document.getElementById("login-form").addEventListener("submit", function(event) {
	event.preventDefault(); // Отменяем действие по умолчанию

	// Получаем значения полей формы
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;

	// Создаем объект с данными для отправки на сервер
	var data = {
		"action": "login",
		"username": username,
		"password": password
	};

	// Отправляем данные на сервер
	sendData(data);
});

// Функция отправки данных на сервер
function sendData(data) {
	// Создаем объект XMLHttpRequest для отправки данных на сервер
	var xhr = new XMLHttpRequest();
	xhr.open("POST", "server.php", true);
	xhr.setRequestHeader("Content-Type", "application/json");

	// Обработчик события загрузки данных с сервера
	xhr.onload = function() {
		if (xhr.status === 200) {
			// Получаем ответ от сервера
			var response = JSON.parse(xhr.responseText);

			// Обрабатываем ответ от сервера
			if (response.success) {
				alert(response.message);
			} else {
				alert(response.error);
			}
		} else {
			alert("Произошла ошибка при отправке данных на сервер.");
		}
	};

	// Отправляем данные на сервер
	xhr.send(JSON.stringify(data));
}