<?php
    require 'DB.php';

    class UserModel {
        private $name;
        private $email;
        private $pass;
        private $re_pass;
        private $image;

        private $_db = null;

        public function __construct() {
            $this->_db = DB::getInstence();
            $this->_db->exec("set names utf8mb4"); //Чтобы не было кракозябр (знаков вопроса)
        }

        public function setData($name, $email, $pass, $re_pass) {
            $this->name = $name;
            $this->email = $email;
            $this->pass = $pass;
            $this->re_pass = $re_pass;
            $this->image = 'user.png'; // изображение по умолчанию
        }
        // Валидация данных
        public function validForm() {
            if(strlen($this->name) < 3)
                return "Имя слишком короткое";
            else if(strlen($this->email) < 3)
                return "Email слишком короткий";
            else if(strlen($this->pass) < 3)
                return "Пароль не менее 3 символов";
            else if($this->pass != $this->re_pass)
                return "Пароли не совпадают";
            else
                return "Верно";
        }
        // Добавление пользователя в БД
        public function addUser() {
            $sql = 'INSERT INTO users(name, email, pass, image) VALUES(:name, :email, :pass, :image)';
            $query = $this->_db->prepare($sql);

            $pass = password_hash($this->pass, PASSWORD_DEFAULT);  // хеширование паролы. Можно использовать md5(), sha1()
            $query->execute(['name' => $this->name, 'email' => $this->email, 'pass' => $pass, 'image' => $this->image]);

            $this->setAuth($this->email);
        }
        // Получение данных о польозователе
        public function getUser() {
            $email = $_COOKIE['login'];
            $result = $this->_db->query("SELECT * FROM `users` WHERE `email` = '$email'");
            return $result->fetch(PDO::FETCH_ASSOC);
        }
        // Выход с сайта (удаление COOKIE)
        public function logOut() {
            setcookie('login', $this->email, time() - 3600, '/');
            unset($_COOKIE['login']);
            header('Location: /user/auth');
        }
        // Авторизация пользователя (установкаа COOKIE на 1 час )
        public function auth($email, $pass) {
            $result = $this->_db->query("SELECT * FROM `users` WHERE `email` = '$email'");
            $user = $result->fetch(PDO::FETCH_ASSOC);

            if($user['email'] == '')
                return 'Пользователя с таким email не существует';
            else if(password_verify($pass, $user['pass']))
                $this->setAuth($email);
            else
                return 'Пароли не совпадают';
        }
        // установкаа COOKIE на 1 час (60*60)
        public function setAuth($email) {
            setcookie('login', $email, time() + 3600, '/');
            header('Location: /user/dashboard'); // заголовок переадресации
        }
        // функция добавление изображения
        public function addimage() {
            if ($_FILES && $_FILES["filename"]["error"]==UPLOAD_ERR_OK) {
                $user = $_COOKIE['login']; // заносим в переменную авторизованного пользователя
                echo $user;
                echo gettype($user);

                // Блок изменения имени файла на уникальное
                $name = $_FILES["filename"]["name"]; // изначальное имя файла.расширение
                $name_without_ext = pathinfo($name, PATHINFO_FILENAME); // изначальное имя 
                $ext = pathinfo($name, PATHINFO_EXTENSION); // расширение
                $new_name = $name_without_ext . "_" . time() . "." . $ext; // новое имя файла.расширение

                // копирование файла на сервер в папку
                $path = "public/img/avatar/" . $new_name;
                move_uploaded_file($_FILES["filename"]["tmp_name"], $path);

                // удаление существующего файла
                $result = $this->_db->query("SELECT `image` FROM `users` WHERE `email` = '$user'");
                $image = $result->fetch(PDO::FETCH_ASSOC);
                echo $image['image'];
                if ($image['image'] != 'user.webp') {
                    unlink("public/img/avatar/" . $image['image']);
                }

                // внесение информации о новом файле в БД
                $sql = "UPDATE users SET image=:image WHERE email=:email;";
                $query = $this->_db->prepare($sql);
                $query->execute(['image' => $new_name, 'email' => $user]);

                header('Location: /user/dashboard'); // заголовок переадресации
            } 
        }

        // Валидация изображения
        public function validImage() {
            if (empty($_FILES['filename']['type']))
                return "Вы не указали файла для загрузки";
            else if($_FILES['filename']['size'] / 1024 > 500)
                return "Размер файла не более 500КБт";
            else 
                return "Верно";
        }
    }