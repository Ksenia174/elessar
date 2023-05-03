<?php

namespace App\models;

use App\helpers\Connection;

class Product
{

    //ищем все товары 
    public static function getAll()
    {
        $query = Connection::make()->query("SELECT * FROM products");
        return $query->fetchAll();
    }

    public static function lastFiveProduct()
    {
        $query = Connection::make()->query("SELECT * FROM products ORDER BY createDate DESC LIMIT 5");
        return $query->fetchAll();
    }

    //ищем товар на складе по его id
    public static function find($id)
    {
        $query = Connection::make()->prepare("SELECT products.*, categories.name as category, stones.name as stone, materials.name as material 
        FROM products 
        INNER JOIN categories ON products.category_id = categories.id 
        INNER JOIN stones ON products.stone_id = stones.id 
        INNER JOIN materials ON products.material_id = materials.id 
        WHERE products.id = :id");
        $query->execute([
            ':id' => $id
        ]);
        return $query->fetch();
    }

    //обновляем количество товара на складе
    public static function updateCount($basket, $conn = null)
    {
        //проверили наличие $conn
        $conn = $conn ?? Connection::make();
        $query = $conn->prepare("UPDATE products SET amount = amount-:amount WHERE id = :product_id");
        foreach ($basket as $item) {
            $query->bindValue(':amount', $item->amount, \PDO::PARAM_INT);
            $query->bindValue(':product_id', $item->product_id, \PDO::PARAM_INT);
            $query->execute();
        }
    }

    public static function getAllproductsByCategory($id)
    {
        $query = Connection::make()->prepare("SELECT products.id as product_id, products.name as product_name, price, amount, photo, categories.name as category, stones.name as stone, materials.name as material 
        FROM products 
        INNER JOIN categories ON products.category_id = categories.id 
        INNER JOIN stones ON products.stone_id = stones.id 
        INNER JOIN materials ON products.material_id = materials.id 
        WHERE products.category_id = ?");
        $query->execute([$id]);
        return $query->fetchAll();
    }

    public static function getAllproductsByStone($id)
    {
        $query = Connection::make()->prepare("SELECT products.id as product_id, products.name as product_name, price, amount, photo, categories.name as category, stones.name as stone, materials.name as material 
        FROM products 
        INNER JOIN categories ON products.category_id = categories.id 
        INNER JOIN stones ON products.stone_id = stones.id 
        INNER JOIN materials ON products.material_id = materials.id 
        WHERE products.stone_id = ?");
        $query->execute([$id]);
        return $query->fetchAll();
    }

    public static function getAllproductsByMaterial($id)
    {
        $query = Connection::make()->prepare("SELECT products.id as product_id, products.name as product_name, price, amount, photo, categories.name as category, stones.name as stone, materials.name as material 
        FROM products 
        INNER JOIN categories ON products.category_id = categories.id 
        INNER JOIN stones ON products.stone_id = stones.id 
        INNER JOIN materials ON products.material_id = materials.id 
        WHERE products.material_id = ?");
        $query->execute([$id]);
        return $query->fetchAll();
    }

    public static function changeProduct($id, $photo, $name, $price, $description, $amount,  $category_id, $stone_id, $material_id)
    {
        $query =  Connection::make()->prepare('UPDATE products SET photo = :photo, name = :name, price = :price, description = :description, amount = :amount, category_id = :category_id, stone_id = :stone_id, material_id = :material_id  WHERE products.id = :id');
        $query->execute([
            "id" => $id,
            'photo' => $photo,
            'name' => $name,
            'price' => $price,
            'description' => $description,
            'amount' => $amount,
            'category_id' => $category_id,
            'stone_id' => $stone_id,
            'material_id' => $material_id
        ]);
    }

    public static function deleteProduct($id)
    {
        $query = Connection::make()->prepare('DELETE FROM products WHERE id = :id');

        $query->execute([
            "id" => $id,
        ]);
    }

    public static function addProduct($photo, $name, $price, $amount, $description, $category_id, $stone_id, $material_id)
    {

        $query =  Connection::make()->prepare('INSERT INTO products (photo, name, price, amount, description, createDate, category_id, stone_id, material_id) VALUES (:photo, :name, :price, :amount, :description, :createDate, :category_id, :stone_id, :material_id)');

        $query->execute([
            'photo' => $photo,
            'name' => $name,
            'price' => $price,
            'amount' => $amount,
            'description' => $description,
            'createDate' => date('Y-m-d H:i:s'),
            'category_id' => $category_id,
            'stone_id' => $stone_id,
            'material_id' => $material_id,
        ]);
        return Connection::make()->lastInsertId();
    }


    //формируем строку с позиционными параметрами
    private static function getParams($array)
    {
        return implode(",", array_fill(0, count($array), "?"));
    }

    //получаем товары по указанным категориям
    public static function productsByManyCategories($categories)
    {
        //формируем параметры для запроса
        $params = self::getParams($categories);
        $query = Connection::make()->prepare("SELECT products.* FROM products WHERE category_id IN($params) AND count > 0");
        $query->execute($categories);
        return $query->fetchAll();
    }

    public static function getProductsByCategories($categories){
        //формируем параметр запроса
        $parameter = self::getParams($categories);

        $query = Connection::make()->prepare("SELECT products.id, products.name, description, price, amount, createDate, photo FROM products INNER JOIN categories ON products.category_id = categories.id WHERE category_id in ($parameter) AND products.amount > 0 ORDER BY createDate DESC");

        $query->execute($categories);

        return  $query->fetchAll();
    }
}
