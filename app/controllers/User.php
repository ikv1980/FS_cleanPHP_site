<?php
    class User extends Controller {

        // Добавление пользователя в БД
        public function reg() {

            $data = [];
            if(isset($_POST['name'])) {
                $user = $this->model('UserModel');
                $user->setData($_POST['name'], $_POST['email'], $_POST['pass'], $_POST['re_pass']);
                // Валидация данных
                $isValid = $user->validForm();
                if($isValid == "Верно")
                    $user->addUser();
                else
                    $data['message'] = $isValid;
            }
            $this->view('user/reg', $data); // Передача данных в представление
        }

        // Отображение личного кабинета пользователя
        public function dashboard() {
            $user = $this->model('UserModel');
            
            // Проверка, а авторизован ли пользователь?
            if(!isset($_COOKIE['login']))
                header('Location: /user/auth');

            // выход пользователя
            if(isset($_POST['exit_btn'])) {
                $user->logOut();
                exit();
            }

            // Получаем данные для отображения на странице. 
            $data = $user->getUser();
            $data['error'] = '';

            // Проверяем была ли нажата кнопка "Загрузить"
            if (isset($_REQUEST['image'])) {
                // Валидация данных
                $isValid = $user->validImage();
                if($isValid == "Верно")
                    $user->addimage();
                    // exit();
                else
                    $data['error'] = $isValid;
            }

            $this->view('user/dashboard', $data); // Передача данных в представление
        }

        // Авторизация пользователя на сайте
        public function auth() {

            $data = [];
            if(isset($_POST['email'])) {
                $user = $this->model('UserModel');
                $data['message'] = $user->auth($_POST['email'], $_POST['pass']);
            }

            $this->view('user/auth', $data);
        }
    }