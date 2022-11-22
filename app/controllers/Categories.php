<?php
    class Categories extends Controller {
        // public function index() {
        //     $products = $this->model('Products');
        //     // $data = ['products' => $products->getProducts(), 'title' => 'Все товары на сайте'];
        //     $data = ['products' => $products->getProductsLimited("id", 8), 'title' => 'Все товары на сайте'];
        //     $this->view('categories/index', $data);
        // }

        // получение диапазона из массива товаров ()    
        public function index($page = 1) {
            $n = 3; // количество товара на странице
            $products = $this->model('Products');
            $list = array_slice($products->getProducts(), (($page - 1)*$n), 3);
            $data = [
                'products' => $list, 
                'title' => 'Все товары на сайте',
                'page' => (int)$page,
                'total_page' => count($products->getProducts()) / $n
            ];
            $this->view('categories/index', $data);
        }

        public function shoes() {
            $products = $this->model('Products');
            $data = ['products' => $products->getProductsCategory('shoes'), 'title' => 'Категория Обувь'];
            $this->view('categories/index', $data);
        }

        public function hats() {
            $products = $this->model('Products');
            $data = ['products' => $products->getProductsCategory('hats'), 'title' => 'Категория Кепки'];
            $this->view('categories/index', $data);
        }

        public function tshirts() {
            $products = $this->model('Products');
            $data = ['products' => $products->getProductsCategory('tshirts'), 'title' => 'Категория Футболки'];
            $this->view('categories/index', $data);
        }

        public function watches() {
            $products = $this->model('Products');
            $data = ['products' => $products->getProductsCategory('watches'), 'title' => 'Категория Часы'];
            $this->view('categories/index', $data);
        }

        public function pagination() {
            $products = $this->model('Products');
            $data = ['products' => $products->getProductsCategory('watches'), 'title' => 'Часы'];
            $this->view('categories/index', $data);
        }
    }