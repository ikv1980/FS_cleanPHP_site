<?php
    class Home extends Controller {
        public function index() {
            $products = $this->model('Products');
            // При помощи rand() выводим рандомные записи из таблицы
            $this->view('home/index', $products->getProductsLimited("rand()", 6));
        }
    }