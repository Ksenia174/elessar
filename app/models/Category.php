<?php

namespace App\models;

use App\helpers\Connection;

class Category{

    public static function getAll()
    {
        $query = Connection::make()->query("SELECT * FROM categories");
        return $query->fetchAll();
    }

    public static function getFirstSix()
    {
        $query = Connection::make()->query("SELECT * FROM categories LIMIT 6");
        return $query->fetchAll();
    }

    public static function find($id)
    {
        $query = Connection::make()->prepare("SELECT * FROM categories WHERE id = :id");
        $query->execute([
            "id" => $id
        ]);
        return $query->fetch();
    }

    public static function addCategory ($categoryName, $image){

        $category = self::find($categoryName);
        if(!$category){
            $query = Connection::make()->prepare("INSERT IGNORE INTO categories (name, image) VALUES (:category_name, :image)");
        $query->execute([
            "category_name"=> $categoryName,
            "image"=> $image
            ]);
        }
    }

    public static function deleteCategory($id){
        $query = Connection::make()->prepare("DELETE FROM categories WHERE id = :id");
        $query->execute(["id" => $id]);
        return "delete";
    }

    public static function changeCategory($id, $name, $image)
    {
        $query =  Connection::make()->prepare('UPDATE categories SET name = :name, image = :image WHERE categories.id = :id');
        $query->execute([
            'id' => $id,
            'name' => $name,
            'image'=> $image
        ]);
    }
}

