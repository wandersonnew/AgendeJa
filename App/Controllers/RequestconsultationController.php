<?php
    namespace App\Controllers;
    use Src\Controller\Action;
    use Src\Model\Container;

    use App\Models\Requestconsultation;

    class RequestconsultationController extends Action {
        public function reqConsultation() {
            $reqconsultation = Container::getModel('Requestconsultation');
            $reqconsultation->__set('id_patient', $_SESSION['id_patient']);
            $reqconsultation->__set('id_medclinic', $_GET['id_medclinic']);
            $reqconsultation->__set('date', $_GET['schedule']);
            $query = $reqconsultation->selectDate();

            if(!$query) {
                $reqconsultation->requestConsultation();
                echo "<pre>";
                print_r($reqconsultation->selectDate());
                echo "</pre>";
                echo "<br>";
            } else {
                echo "Horário preenchido";
            }

            

            
            
            /*$result = $clinic->verify();
            if($result == NULL) {
                $clinic->toregister();
                header('Location: /doctor/clinic?registered=true');
            } else {
                header('Location: /doctor/clinic?registered=false');
            }*/
        }

        public function selectYear($date) {
            $reqconsultation = Container::getModel('Requestconsultation');
            $reqconsultation->__set('date', $date);
            return $reqconsultation->selectYear();
        }
    }

?>