<?php

namespace App\models;

use App\helpers\Connection;

class Material
{
    public static function getAll()
    {
        $query = Connection::make()->query("SELECT * FROM materials");
        return $query->fetchAll();
    }

    public static function find($id)
    {
        $query = Connection::make()->prepare("SELECT * FROM materials WHERE id = :id");
        $query->execute([
            "id" => $id
        ]);
        return $query->fetch();
    }

    
    public static function addMaterial($materialName){

        $stone = self::find($materialName);
        if(!$stone){
            $query = Connection::make()->prepare("INSERT IGNORE INTO materials (name) VALUES (:material_name)");
        $query->execute([
            "material_name"=> $materialName,
            ]);
        }
    }

    public static function deleteMaterial($id){
        $query = Connection::make()->prepare("DELETE FROM materials WHERE id = :id");
        $query->execute(["id" => $id]);
        return "delete";
    }

    public static function changeMaterial($id, $name)
    {
        $query =  Connection::make()->prepare('UPDATE materials SET name = :name WHERE materials.id = :id');
        $query->execute([
            'id' => $id,
            'name' => $name,
        ]);
    }
}