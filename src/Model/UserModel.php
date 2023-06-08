<?php
namespace App\Model;

use App\Core\AbstractModel;
use App\Entity\User;

class UserModel extends AbstractModel{

    public function addUsers($gender, $name, $firstName, $email, $address, $password, $postalCode, $city){
        $sql = 'INSERT INTO users
            (gender, name, firstName, email, address, password, postalCode, city)
            VALUES (?,?,?,?,?,?,?,?)';
        $this->db->prepareAndExecute($sql, [$gender, $name, $firstName, $email, $address, $password, $postalCode, $city]);    
    }

    public function verifyMail($email){
        $sql = 'SELECT * FROM users WHERE email = ?';
        $pdoStatement = $this->db->getOneResult($sql, [$email]);
        if($pdoStatement != 0){
            return true;
        }
        else{
            return false;
        }
    }

    public function getAllUsers(){
        $sql = 'SELECT * FROM users';
        $pdoStatement = $this->db->getAllResults($sql);
        return $this->convertDbTableToUsertModel($pdoStatement);
    }

    public function getUserById($idUser){
        $sql = 'SELECT * FROM users
        WHERE idUser  = ?';
        $query = $this->db->getOneResult($sql, [$idUser]);     
        return new User($query);
    }

    public function convertDbTableToUsertModel($dbTable){
        $users = [];
        foreach($dbTable as $line){
            $users[] = new User($line);
        }
        return $users;
    }

    public function getUserByEmail($email){
        $customers = $this->getAllUsers();

        // On vérifie l'existance de l'email seulement si celui-ci est rempli et valide
        foreach ($customers as $customer) {
            if($customer->getEmail() == $email) {
                return $customer;
            }
        }
        // Ici je sais que je n'ai pas trouvé le client
        return null;
    }

    public function checkCustomer($email, $password){
        $customer = $this->getUserByEmail($email);

        if ($customer == null) {
            return false;
        }  
        if (!password_verify($password, $customer->getPassword())) {
            return false;
        }

        return $customer;
    }

    public function editInformationUser($gender, $name, $firsName, $idUser){
        $sql = 'UPDATE users SET gender=?, name=?, firstName=? WHERE idUser=?';
        $this->db->prepareAndExecute($sql, [$gender, $name, $firsName, $idUser]);
    }

    public function editPasswordUder($password, $idUser){
        $sql = 'UPDATE users SET password=? WHERE idUser=?';
        $this->db->prepareAndExecute($sql, [$password, $idUser]);
    }

    public function editEmail($email, $idUser){
        $sql = 'UPDATE users SET email=? WHERE idUser=?';
        $this->db->prepareAndExecute($sql, [$email, $idUser]);
    }

}









function tests(){
    $userController = new UserModel();
    $result = $userController->checkCustomer("aicha@gmail.com", "Cheikha123");
    var_dump($result);

}

//tests();