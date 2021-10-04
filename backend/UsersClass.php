<?php

require_once "AbstractCrud.php";

class UsersClass extends AbstractCrud {
    const TABLENAME = "users";

    public function saveUser($name, $designation) {
        $data = [
            "name" => $name,
            "designation" => $designation
        ];

        return $this->create(self::TABLENAME, $data);

    }

    public function getUsers($offset, $limit) {
        return $this -> readAllUsers(self::TABLENAME, $offset, $limit);
    }

    public function getPages($perPage) {
        return $this -> getPageCount(self::TABLENAME, $perPage);
    }

    public function updateData($id, $data) {
        return $this -> update(self::TABLENAME, $id, $data);
    }

    public function deleteData($id) {
        return $this -> delete(self::TABLENAME, $id);
    }
    
}