<?php
// класс для подключения к БД (шаблон проектированияя Одиночка)
class DB {
    // 1. Создание статической переменной
    private static $_db = null;

    // 2. Метод на основе статической переменной
    public static function getinstence() {
        if(self::$_db == null) {
            // если переменная путсая - устанавливаем параметры подключение к БД
            $user = 'root';
            $password = '';
            $db = 'ecommerce';
            $host = '127.0.0.1';
            $port = 3306;
            $dsn = 'mysql:host=' . $host . ';dbname=' . $db . ';port=' . $port;
            self::$_db = new PDO($dsn, $user, $password);
        // возвращаем статичную переменную
        return self::$_db;
        }
    }

    // запрет создания объектов на основе данного класса (модификатор private)
    // доступ к конструктору запрещен
    private function __construct() {}
    // клонирование объекта зхапрещено
    private function __clone() {}
    // срабатывает при восстановлении данных
    private function __wakeup() {}
}