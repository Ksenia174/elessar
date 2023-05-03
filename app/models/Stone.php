<?php

namespace App\models;

use App\helpers\Connection;

class Stone
{
    public static function getAll()
    {
        $query = Connection::make()->query("SELECT * FROM stones");
        return $query->fetchAll();
    }

    public static function find($id)
    {
        $query = Connection::make()->prepare("SELECT * FROM stones WHERE id = :id");
        $query->execute([
            "id" => $id
        ]);
        return $query->fetch();
    }

    public static function addStone($stoneName){

        $stone = self::find($stoneName);
        if(!$stone){
            $query = Connection::make()->prepare("INSERT IGNORE INTO stones (name) VALUES (:stone_name)");
        $query->execute([
            "stone_name"=> $stoneName,
            ]);
        }
    }

    public static function deleteStone($id){
        $query = Connection::make()->prepare("DELETE FROM stones WHERE id = :id");
        $query->execute(["id" => $id]);
        return "delete";
    }

    public static function changeStone($id, $name)
    {
        $query =  Connection::make()->prepare('UPDATE stones SET name = :name WHERE stones.id = :id');
        $query->execute([
            'id' => $id,
            'name' => $name,
        ]);
    }
}
