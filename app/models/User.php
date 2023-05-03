<?php

namespace App\models;

use App\helpers\Connection;

class User{
    public static function getAll()
    {
        $query = Connection::make()->query("SELECT * FROM users");
        return $query->fetchAll();
    }

    public static function insert($data)
    {
        $query = Connection::make()->prepare("INSERT INTO users (name,email,number,password) VALUES (:name,:email,:number,:password);");

        return $query->execute([
            ':name' => $data['name'],
            ':email' => $data['login'],
            ':number' => $data['number'],
            ':password' => password_hash($data['password'], PASSWORD_DEFAULT),
        ]);
    }

    public static function getUser($login, $password)
    {
        $query = Connection::make()->prepare("SELECT * FROM users WHERE users.email = :email");
        $query->execute([':email' => $login]);

        $user = $query->fetch();
        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return null;
    }

    public static function allRole()
    {
        $query = Connection::make()->query("SELECT role FROM users");
        return $query->fetchAll();
    }

    public static function findLogin($login)
    {
        $query = Connection::make()->prepare("SELECT users.id ,users.name, users.email FROM users WHERE users.email = ?");
        $query->execute([$login]);
        $res = $query->fetchAll();
        return !empty($res);
    }

    public static function findNumber($number)
    {
        $query = Connection::make()->prepare("SELECT users.id ,users.name, users.number FROM users WHERE users.number = ?");
        $query->execute([$number]);
        $res = $query->fetchAll();
        return !empty($res);
    }

    public static function find($id)
    {
        $query = Connection::make()->prepare("SELECT * FROM users WHERE users.id = :userID");
        $query->execute(['userID' => $id]);
        $user = $query->fetch();
        return $user;
    }
}