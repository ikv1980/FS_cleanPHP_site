<?php
    // запуск работы с сессиями
    session_start();
    class BasketModel {
        private $session_name = 'cart';
        
        // проверяет установленна ли сейчас сессия по ключу $session_name (true || false)
        public function isSetSession() {
            return isset($_SESSION[$this->session_name]);
            
        }

        // удаление сессии по ключу $session_name
        public function deleteSession() {
            unset($_SESSION[$this->session_name]);
            session_destroy();
            header('Location: /basket');
        }

        // возвращает значение, которое записано в переменную $session_name ('cart')
        public function getSession() {
            return $_SESSION[$this->session_name];
        }
        // функция, позволяющая добавлять товар в сессию по его ID
        public function addToCart($itemID) {
            if(!$this->isSetSession())
                $_SESSION[$this->session_name] = $itemID;
            else {
                $items = explode(",", $_SESSION[$this->session_name]);

                $itemExist = false;
                foreach ($items as $el) {
                    if($el == $itemID)
                        $itemExist = true;
                }

                if(!$itemExist)
                    $_SESSION[$this->session_name] = $_SESSION[$this->session_name].','.$itemID;
            }
        }

        // функция, позволяющая удалить товар из сессии по его ID
        public function delToCart($itemID) {
            $array = explode(",", $_SESSION[$this->session_name]);
            unset($array[array_search($itemID,$array)]);
            $_SESSION[$this->session_name] = implode(',', $array);
        }

        // подсчет количества элементов в сессии
        public function countItems() {
            if(!$this->isSetSession())
                return 0;
            else {
                $items = explode(",", $_SESSION[$this->session_name]); // создание массива
                return count($items);
            }
        }
    }