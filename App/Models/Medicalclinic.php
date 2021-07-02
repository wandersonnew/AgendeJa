<?php
    namespace App\Models;
    use Src\Model\Model;

    class Medicalclinic extends Model {
        private $id_medclinic;
        private $name;
        private $email;
        private $tel;
        private $address;
        private $cnpj;
        private $is_active;

        public function __get($attribute) {
            return $this->$attribute;
        }

        public function __set($attribute, $value) {
            $this->$attribute = $value;
        }

        public function toregister() {
            $sql = $this->db->prepare("INSERT INTO medical_clinics (name, email, tel, address, cnpj) VALUES (?, ?, ?, ?, ?)");
            $sql->bindValue(1, $this->__get('name'));
            $sql->bindValue(2, $this->__get('email'));
            $sql->bindValue(3, $this->__get('tel'));
            $sql->bindValue(4, $this->__get('address'));
            $sql->bindValue(5, $this->__get('cnpj'));
            $sql->execute();
            return $this;
        }

        public function verifyName() {
            $sql = $this->db->prepare("SELECT * FROM medical_clinics WHERE name = :name AND is_active = true");
            $sql->bindValue(':name', $this->__get('name'));
            $sql->execute();
            //return $sql->setFetchMode(\PDO::FETCH_ASSOC);//retorna um se existe
            return $sql->fetchAll(\PDO::FETCH_ASSOC);//retorna os dados
        }

        public function selectId() {
            $sql = $this->db->prepare("SELECT * FROM medical_clinics WHERE id_medclinic = :id_medclinic AND is_active = true");
            $sql->bindValue(':id_medclinic', $this->__get('id_medclinic'));
            $sql->execute();
            //return $sql->setFetchMode(\PDO::FETCH_ASSOC);//retorna um se existe
            return $sql->fetchAll(\PDO::FETCH_ASSOC);//retorna os dados
        }

        public function selectAll() {
            $sql = $this->db->prepare("SELECT * FROM medical_clinics WHERE is_active = true");
            $sql->execute();
            //return $sql->setFetchMode(\PDO::FETCH_ASSOC);//retorna um se existe
            return $sql->fetchAll(\PDO::FETCH_ASSOC);//retorna os dados
        }

        public function update() {
            $sql = $this->db->prepare("UPDATE medical_clinics SET name = ?, email = ?, tel = ?, address = ?, cnpj = ? WHERE id_medclinic = ?");
            $sql->bindValue(1, $this->__get('name'));
            $sql->bindValue(2, $this->__get('email'));
            $sql->bindValue(3, $this->__get('tel'));
            $sql->bindValue(4, $this->__get('address'));
            $sql->bindValue(5, $this->__get('cnpj'));
            $sql->bindValue(6, $this->__get('id_medclinic'));
            $sql->execute();
            return $this;

        }
    }
    
?>