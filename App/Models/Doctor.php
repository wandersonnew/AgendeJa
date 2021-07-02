<?php
    namespace App\Models;
    use Src\Model\Model;

    class Doctor extends Model {
        private $name;
        private $email;
        private $tel;
        private $password;

        public function __get($attribute) {
            return $this->$attribute;
        }

        public function __set($attribute, $value) {
            $this->$attribute = $value;
        }

        public function verifyEmail() {
            $sql = $this->db->prepare("SELECT * FROM doctors WHERE email = :email");
            $sql->bindValue(':email', $this->__get('email'));
            $sql->execute();
            //return $sql->setFetchMode(\PDO::FETCH_ASSOC);//retorna um se existe
            return $sql->fetchAll(\PDO::FETCH_ASSOC);//retorna os dados
        }
    }
    
?>