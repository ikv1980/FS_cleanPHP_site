<?php
    class Basket extends Controller {
        public function index() {

            $data = [];
            $cart = $this->model('BasketModel');

            // Добавление товара в корзину
            if(isset($_POST['item_id']))
                $cart->addToCart($_POST['item_id']);

            // Удаление товара из корзины
            if (isset($_REQUEST['delete'])) {
                $cart->delToCart($_POST['id']);
            } 

            // Удаление всех товаров из корзины
            if (isset($_REQUEST['dellall'])) {
            // if (isset($_POST['dellall'])) {
                $cart->deleteSession();
            } 

            if(!$cart->isSetSession())
                $data['empty'] = 'Пустая корзина';
            else {
                $products = $this->model('Products');
                $data['products'] = $products->getProductsCart($cart->getSession());
            }

            $this->view('basket/index', $data);
        }
    }