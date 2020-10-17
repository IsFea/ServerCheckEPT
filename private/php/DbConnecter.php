<?php
$servername = 'DESKTOP-BNU2UQ7\SQLEXPRESS'; // instance и порт - необязательные параметры
$options = [
   'UID' => 'admin', // имя пользователя, имеющего доступ к БД
   'PWD' => '6ydLyRCQ7puRSSpz', // пароль
   'Database' => 'RosSeti', // название БД, к которой подключаемся
   'CharacterSet' => "UTF-8"
];
$conn = sqlsrv_connect($servername, $options);
if( $conn === false ) {
   die( print_r( sqlsrv_errors() ));
}
else{
   // echo 'Соединение установлено';
}
