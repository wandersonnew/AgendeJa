<?php
    namespace App\Models;
    use Src\Model\Model;

    class Patient extends Model {
        private $name;
        private $email;
        private $tel;
        private $address;
        private $password;

        public function __get($attribute) {
            return $this->$attribute;
        }

        public function __set($attribute, $value) {
            $this->$attribute = $value;
        }

        public function toregister() {
            $sql = $this->db->prepare("INSERT INTO patients (name, email, tel, address, password) VALUES (?, ?, ?, ?, ?)");
            $sql->bindValue(1, $this->__get('name'));
            $sql->bindValue(2, $this->__get('email'));
            $sql->bindValue(3, $this->__get('tel'));
            $sql->bindValue(4, $this->__get('address'));
            $sql->bindValue(5, $this->__get('password'));
            $sql->execute();
            return $this;
        }

        public function verifyEmail() {
            $sql = $this->db->prepare("SELECT * FROM patients WHERE email = :email");
            $sql->bindValue(':email', $this->__get('email'));
            $sql->execute();
            //return $sql->setFetchMode(\PDO::FETCH_ASSOC);//retorna um se existe
            return $sql->fetchAll(\PDO::FETCH_ASSOC);//retorna os dados
        }
    }
    
?>