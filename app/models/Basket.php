<?php

namespace App\models;

use App\helpers\Connection;

class Basket
{
    public static function search($product_id, $user_id)
    {
        $query = Connection::make()->prepare("SELECT baskets.*, products.price, baskets.amount*products.price as price_position FROM baskets INNER JOIN products ON baskets.product_id = products.id WHERE product_id = :product_id AND user_id = :user_id");
        $query->execute([
            'product_id' => $product_id,
            'user_id' => $user_id
        ]);
        return $query->fetch();
    }

    //итоговая стоимость
    public static function totalPrice($user_id)
    {
        $query = Connection::make()->prepare("SELECT SUM(baskets.amount*products.price) as sum FROM baskets INNER JOIN products ON baskets.product_id = products.id WHERE baskets.user_id = :user_id");
        $query->execute([
            ':user_id' => $user_id
        ]);
        return $query->fetch(\PDO::FETCH_COLUMN);
    }

    //итоговое количество
    public static function totalCount($user_id)
    {
        $query = Connection::make()->prepare("SELECT SUM(amount) as total_count FROM baskets WHERE user_id = :user_id");
        $query->execute([
            ':user_id' => $user_id
        ]);
        return $query->fetch(\PDO::FETCH_COLUMN);
    }

    //добавление товар в корзину пользователя
    public static function add($product_id, $user_id)
    {
        //поищем товар в корзине пользователя
        $productInBasket = self::search($product_id, $user_id);

        //ищем аналогичный товар на складе
        $product = Product::find($product_id);

        //если товара нет в корзине, то мы его в корзину добавим в количестве = 1
        if (!$productInBasket) {
            $query = Connection::make()->prepare('INSERT INTO baskets (user_id,product_id,amount) VALUE (:user_id,:product_id,1)');
            $query->execute([
                ':user_id' => $user_id,
                ':product_id' => $product_id
            ]);
        }
        //иначе если количество товаров в корзине не больше того, что имеется на складе, то увеличиваем на 1
        else {
            if ($productInBasket->amount < $product->amount) {
                $query = Connection::make()->prepare('UPDATE baskets SET amount=amount+1 WHERE product_id = :product_id AND user_id = :user_id');
                $query->execute([
                    'product_id' => $product_id,
                    'user_id' => $user_id
                ]);
            }
        }
        return self::search($product_id, $user_id);
    }

    public static function minus($product_id, $user_id)
    {
        //поищем товар в корзине пользователя
        $productInBasket = self::search($product_id, $user_id);

        if ($productInBasket->amount > 1) {
            $query = Connection::make()->prepare('UPDATE baskets SET amount=amount-1 WHERE product_id = :product_id AND user_id = :user_id');
            $query->execute([
                'product_id' => $product_id,
                'user_id' => $user_id
            ]);
        }
        return self::search($product_id, $user_id);
    }

    //получаем корзину пользователя
    public static function productsInBasket($user_id)
    {
        $query = Connection::make()->prepare('SELECT baskets.*, products.photo, products.name, products.description, products.price, baskets.amount*products.price as price_position FROM baskets INNER JOIN products ON baskets.product_id=products.id WHERE baskets.user_id=:user_id');
        $query->execute(['user_id' => $user_id]);
        return $query->fetchAll();
    }

    //удаляем товар из корзины
    public static function delete($product_id, $user_id)
    {
        $query = Connection::make()->prepare("DELETE FROM baskets WHERE product_id = :product_id AND user_id = :user_id");
        $query->execute([
            ':product_id' => $product_id,
            ':user_id' => $user_id
        ]);
        return "delete";
    }

    //очищаем корзину пользователя
    public static function clear($user_id, $conn = null)
    {
        $conn = $conn ?? Connection::make();

        $query = $conn->prepare("DELETE FROM baskets WHERE user_id = :user_id");
        $query->execute([
            ':user_id' => $user_id
        ]);
        return "clear";
    }
}
