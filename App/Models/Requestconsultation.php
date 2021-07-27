<?php
    namespace App\Models;
    use Src\Model\Model;
    use Models\Patient;

    class Requestconsultation extends Model {
        private $id_consultation;
        private $approved;
        private $id_patient;
        private $id_medclinic;
        private $id_secretary;
        private $date;

        public function __get($attribute) {
            return $this->$attribute;
        }

        public function __set($attribute, $value) {
            $this->$attribute = $value;
        }

        public function requestConsultation() {
            $sql = $this->db->prepare("INSERT INTO request_consultation (id_patient, id_medclinic, date) VALUES (?, ?, ?)");
            $sql->bindValue(1, $this->__get('id_patient'));
            $sql->bindValue(2, $this->__get('id_medclinic'));
            $sql->bindValue(3, $this->__get('date'));
            $sql->execute();
            return $this;
        }

        public function selectDate() {
            $sql = $this->db->prepare("SELECT id_patient, id_medclinic, date FROM request_consultation WHERE date = :date");
            $sql->bindValue(':date', $this->__get('date'));
            $sql->execute();
            //return $sql->setFetchMode(\PDO::FETCH_ASSOC);//retorna um se existe
            return $sql->fetchAll(\PDO::FETCH_ASSOC);//retorna os dados
        }

        public function selectYear() {
            $sql = $this->db->prepare("SELECT * FROM request_consultation WHERE date LIKE CONCAT(:date, '%') ORDER BY date ASC");
            $sql->bindValue(':date', $this->__get('date'));
            $sql->execute();
            //return $sql->setFetchMode(\PDO::FETCH_ASSOC);//retorna um se existe
            return $sql->fetchAll(\PDO::FETCH_ASSOC);//retorna os dados
        }
    }
?>