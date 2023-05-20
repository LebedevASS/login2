<?php
header("Content-Type: application/json");

// Получаем данные от клиента
$data = json_decode(file_get_contents("php://input"), true);

// Обрабатываем данные и отправляем ответ клиенту
if ($data["action"] == "register") {
	// Регистрация нового пользователя
	$username = $data["username"];
	$password = $data["password"];

	// Создаем новый объект пользователя
	$user = array("username" => $username, "password" => $password );

    // Записываем данные пользователя в файл
    $users = json_decode(file_get_contents("users.json"), true);
    $users[] = $user;
    file_put_contents("users.json", json_encode($users));

    // Оправляем ответ клиенту
    $response = array(
        "success" => true,
        "message" => "Регистрация прошла успешно."
    );
    echo json_encode($response);
} 

elseif ($data["action"] == "login") { 
    // Авторизация пользователя 
    $username = $data["username"];
    $password = $data["password"];

// Проверяем, существует ли пользователь с таким именем и паролем
$users = json_decode(file_get_contents("users.json"), true);
$found = false;
foreach ($users as $user) {
	if ($user["username"] == $username && $user["password"] == $password) {
		$found = true;
		break;
	}
}

// Отправляем ответ клиенту
if ($found) {
	$response = array(
		"success" => true,
		"message" => "Авторизация прошла успешно."
	);
	echo json_encode($response);
} 
else {
	$response = array(
		"success" => false,
		"error" => "Неправильное имя пользователя или пароль."
	);
	echo json_encode($response);
}
}?> 