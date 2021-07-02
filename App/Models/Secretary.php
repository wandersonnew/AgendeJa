<?php
    namespace App\Models;
    use Src\Model\Model;

    class Secretary extends Model {
        private $id_secretary;
        private $name;
        private $email;
        private $tel;
        private $password;
        private $is_super;
        private $is_active;
        private $id_medclinic;


        public function __get($attribute) {
            return $this->$attribute;
        }

        public function __set($attribute, $value) {
            $this->$attribute = $value;
        }

        public function toregister() {
            $sql = $this->db->prepare("INSERT INTO secretaries (name, email, tel, password, is_super, id_medclinic) VALUES (?, ?, ?, ?, ?, ?)");
            $sql->bindValue(1, $this->__get('name'));
            $sql->bindValue(2, $this->__get('email'));
            $sql->bindValue(3, $this->__get('tel'));
            $sql->bindValue(4, $this->__get('password'));
            $sql->bindValue(5, $this->__get('is_super'));
            $sql->bindValue(6, $this->__get('id_medclinic'));
            $sql->execute();
            return $this;
        }

        public function verifyEmail() {
            $sql = $this->db->prepare("SELECT * FROM secretaries WHERE email = :email");
            $sql->bindValue(':email', $this->__get('email'));
            $sql->execute();
            //return $sql->setFetchMode(\PDO::FETCH_ASSOC);//retorna um se existe
            return $sql->fetchAll(\PDO::FETCH_ASSOC);//retorna os dados
        }

        public function selectId() {
            $sql = $this->db->prepare("SELECT * FROM secretaries WHERE id_secretary = :id_secretary AND is_active = true");
            $sql->bindValue(':id_secretary', $this->__get('id_secretary'));
            $sql->execute();
            //return $sql->setFetchMode(\PDO::FETCH_ASSOC);//retorna um se existe
            return $sql->fetchAll(\PDO::FETCH_ASSOC);//retorna os dados
        }

        public function selectAll() {
            $sql = $this->db->prepare("SELECT * FROM secretaries WHERE is_active = true");
            $sql->execute();
            //return $sql->setFetchMode(\PDO::FETCH_ASSOC);//retorna um se existe
            return $sql->fetchAll(\PDO::FETCH_ASSOC);//retorna os dados
        }

        public function update() {
            $sql = $this->db->prepare("UPDATE secretaries SET name = ?, email = ?, tel = ?, password = ?, is_super = ?, id_medclinic = ? WHERE id_secretary = ?");
            $sql->bindValue(1, $this->__get('name'));
            $sql->bindValue(2, $this->__get('email'));
            $sql->bindValue(3, $this->__get('tel'));
            $sql->bindValue(4, $this->__get('password'));
            $sql->bindValue(5, $this->__get('is_super'));
            $sql->bindValue(6, $this->__get('id_medclinic'));
            $sql->bindValue(7, $this->__get('id_secretary'));
            $sql->execute();
            return $this;

        }

        public function delete() {
            $sql = $this->db->prepare("UPDATE secretaries SET is_active = false WHERE id_secretary = ?");
            $sql->bindValue(1, $this->__get('id_secretary'));
            $sql->execute();
            return $this;
        }


    }
    
?>