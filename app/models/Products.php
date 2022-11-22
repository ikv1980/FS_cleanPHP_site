<?php
    require 'DB.php';

    class Products {
        private $_db = null;

        public function __construct() {
            $this->_db = DB::getinstence();
        }

        // Получение всех записей из таблицы products
        public function getProducts() {
            $result = $this->_db->query("SELECT * FROM `products` ORDER BY `id` ASC");
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        // Получение записей из таблицы products с условием:
        // сортировать по $order и выводить $limit записей
        public function getProductsLimited($order, $limit) {
            $result = $this->_db->query("SELECT * FROM `products` ORDER BY $order ASC LIMIT $limit");
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        // Получение всех записей из таблицы products, относящихся к категории $category
        public function getProductsCategory($category) {
            $result = $this->_db->query("SELECT * FROM `products` WHERE `category` = '$category' ORDER BY `id` DESC");
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        // Получение одной записи по $id
        public function getOneProduct($id) {
            $result = $this->_db->query("SELECT * FROM `products` WHERE `id` = '$id'");
            return $result->fetch(PDO::FETCH_ASSOC);
        }

    }