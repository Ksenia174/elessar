<?php

namespace App\models;

use App\helpers\Connection;

class Order
{
    public static function create($user_id)
    {
        //получаем корзину пользователя
        $basket = Basket::productsInBasket($user_id);

        //установим подключение для работы с транзакцией
        $conn = Connection::make();

        //транзакция
        try {
            //открываем транзакцию
            $conn->beginTransaction();

            //1: создаём новый заказ
            $order_id = self::addOrder($user_id, $conn);

            //2: добавляем продукты в заказ
            self::addOrderProducts($basket, $order_id, $conn);

            //3: коректируем количество товаров на складе
            Product::updateCount($basket, $conn);

            //4: очищаем корзину пользователя
            Basket::clear($user_id, $conn);

            //принимаем транзакцию
            $conn->commit();

            return "Заказ оформлен";
        } catch (\PDOException $error) {
            //откатываем транзакцию в случаи ошибки
            $conn->rollBack();
            echo "Ошибка" . $error->getMessage();
        }
        var_dump($order_id);
    }


    //добавление нового заказа
    public static function addOrder($user_id, $conn)
    {
        $query = $conn->prepare('INSERT INTO orders (user_id,date_of_registrations,date_of_complection) VALUES (:user_id,:date_of_registrations,:date_of_complection)');
        $query->execute([
            ':user_id' => $user_id,
            ':date_of_registrations' => date("Y-m-d"),
            ':date_of_complection' => date("Y-m-d")
        ]);
        return $conn->lastInsertId();
    }

    public static function addOrderProductsTemp($product_id, $user_id, $count)
    {
        $query = Connection::make()->prepare('INSERT INTO products_in_orders (user_id,product_id,amount) VALUES (:user_id,:product_id,:amount');
        $query->execute([
            'user_id' => $user_id,
            'product_id' => $product_id,
            'amount' => $count
        ]);
    }

    private static function getParams($array, $value)
    {
        return implode(",", array_fill(0, count($array), $value));
    }

    //добавление продуктов в таблицу products_in_orders
    public static function addOrderProducts($basket, $order_id, $conn)
    {
        $queryText = "INSERT INTO products_in_orders (order_id,product_id,amount) VALUES ";
        $params = self::getParams($basket, "(?,?,?)");
        $queryText .= $params;
        $values = [];
        foreach ($basket as $item) {
            $values[] = $order_id;
            $values[] = $item->product_id;
            $values[] = $item->amount;
        }
        $query = $conn->prepare($queryText);
        $query->execute($values);
    }

    public static function getAll()
    {
        $query = Connection::make()->query("SELECT orders.id as order_id, users.email as login, statuses.name as statuse, orders.reason_cancel, orders.date_of_registrations, orders.date_of_complection FROM orders INNER JOIN statuses ON orders.status_id = statuses.id INNER JOIN users ON orders.user_id = users.id");
        return $query->fetchAll();
    }

    public static function countByOrder($order_id)
    {
        $query = Connection::make()->prepare("SELECT SUM(products_in_orders.amount) as count_product_order FROM products_in_orders WHERE order_id = ? ");
        $query->execute([$order_id]);
        return $query->fetch();
    }

    public static function getAllProductsByOrder($order_id)
    {
        $query = Connection::make()->prepare("SELECT products.name, (products.price * products_in_orders.amount) as price_product_order, products_in_orders.amount as product_count FROM products_in_orders INNER JOIN products ON products.id = products_in_orders.product_id WHERE order_id = ?");
        $query->execute([$order_id]);
        return $query->fetchAll();
    }

    public static function getAllOrdersByUser($user_id){
        $query = Connection::make()->prepare("SELECT orders.id as order_id, users.name, statuses.name as statuse, (SELECT SUM(amount) FROM products_in_orders WHERE products_in_orders.order_id = orders.id) as count, (SELECT products.name FROM products_in_orders INNER JOIN products ON product_id = products.id WHERE order_id = orders.id) as name_product ,(SELECT products.photo FROM products_in_orders INNER JOIN products ON product_id = products.id WHERE order_id = orders.id) as photo_products, (SELECT SUM(products_in_orders.amount * products.price) as price_product_order FROM products_in_orders INNER JOIN products ON product_id = products.id WHERE order_id = orders.id) as price FROM orders INNER JOIN statuses ON orders.status_id = statuses.id INNER JOIN users ON orders.user_id = users.id WHERE user_id = ?");
        $query->execute([$user_id]);
        return $query->fetchAll();
    }

    public static function getCountAllByOrder($order_id)
    {
        $query = Connection::make()->prepare("SELECT SUM(products_in_orders.amount) as count_product_order FROM products_in_orders WHERE order_id = ? ");
        $query->execute([$order_id]);
        return $query->fetch();
    }

    public static function getPriceAllByOrder($order_id)
    {
        $query = Connection::make()->prepare("SELECT SUM(products_in_orders.amount * products.price) as price_product_order FROM products_in_orders INNER JOIN products ON product_id = products.id WHERE order_id = ? ");
        $query->execute([$order_id]);
        return $query->fetch();
    }

    public static function find($order_id)
    {
        $query = Connection::make()->prepare("SELECT orders.id as order_id, users.name as user, users.email as login, statuses.name as status, reason_cancel, date_of_registrations, date_of_complection FROM orders INNER JOIN users ON orders.user_id = users.id INNER JOIN statuses ON orders.status_id = statuses.id WHERE orders.id = ?");
        $query->execute([$order_id]);
        return $query->fetch();
    }

    public static function allStatus()
    {
        $query = Connection::make()->query("SELECT * FROM statuses");
        return $query->fetchAll();
    }

    public static function changeStatus($order_id, $status_id, $message)
    {
        $query = Connection::make()->prepare("UPDATE orders SET status_id = :status_id, reason_cancel = :message, date_of_complection = :date_of_complection WHERE id = :order_id");
        if ($status_id != 3) {
            $message = null;
        }
        $query->execute([
            'status_id' => $status_id,
            'message' => $message,
            'order_id' => $order_id,
            'date_of_complection' => date('Y-m-d H:i:s'),
        ]);
        return $query->fetch();
    }

    private static function getParameters($array)
    {
        return implode(",", array_fill(0, count($array), "?"));
    }

    public static function getOrdersByStatuses($arr)
    {
        //формируем параметр запроса
        $parameter = self::getParameters($arr);
        $query = Connection::make()->prepare("SELECT orders.id as order_id, users.email, statuses.name as statuse, orders.reason_cancel, orders.date_of_registrations, orders.date_of_complection, (SELECT SUM(amount) FROM products_in_orders WHERE products_in_orders.order_id = orders.id) as count, (SELECT SUM(products_in_orders.amount * products.price) as price_product_order FROM products_in_orders INNER JOIN products ON product_id = products.id WHERE order_id = orders.id) as price FROM orders INNER JOIN statuses ON orders.status_id = statuses.id INNER JOIN users ON orders.user_id = users.id WHERE status_id in ($parameter) ORDER BY date_of_registrations DESC");
        $query->execute($arr);
        return  $query->fetchAll();
    }
}
