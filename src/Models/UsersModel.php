<?php


namespace App\Models;

use App\Interfaces\UserModelInterface;


class UsersModel implements \App\Interfaces\UserModelInterface
{
    private $db;

    /**
     * UserModel constructor.
     * @param $dbConnection
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllUserIds() {
        $user_query = $this->db->prepare("SELECT `id` FROM `users`;");
        $user_query->execute();

        return $user_query->fetchAll();
    }

    public function updateNewIdNumber($user) {
        $user_query = $this->db->prepare("UPDATE `users` SET `new_id`= :new_id WHERE `id`=:id");
        $user_query->execute($user);

        return $user_query;
    }
}