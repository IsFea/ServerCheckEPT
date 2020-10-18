<?php

// Роутер
function route($method, $urlData, $formData) {
    
    // Получение информации о геолокации
    // 
    if ($method === 'POST' && count($urlData) === 1) {
        // Получаем id клиента (сотрудника)
        $id = $urlData[0];
        //Геолокация
        $lat = $urlData[1];
        $lon = $urlData[2];

        $status = $urlData[3];

        /**
         * TODO:
         * Актуализация данных по сотрудникам в базе 
         * 
         * Мобильное APP отправляет по таймеру позицию своего местоположения и текущий статус
         */

        return;
    }

    // Выдача информации о тикетах
    // 
    if ($method === 'POST' && count($urlData) === 1) {
        /**
         * TODO:
         * 
         * Реализация запроса к базе на получение необходимых полей по тикетам
         */

        // Выводим ответ клиенту
        echo json_encode(array(
            'idTicket' => rand(1, 100),
            //.....
        ));
        return;
    }

    // Выдача актуализационной информации об оборудовании
    // 
    if ($method === 'POST' && count($urlData) === 1) {
        /**
         * TODO:
         * 
         * Реализация запроса к базе на получение актуализационной информации (оборудование и т.п.)
         */

        // Выводим ответ клиенту
        echo json_encode(array(
            'idObject' => rand(1, 100),
            //.....
        ));
        return;
    }

    // Возвращаем ошибку
    header('HTTP/1.0 400 Bad Request');
    echo json_encode(array(
        'error' => 'Bad Request'
    ));

}
