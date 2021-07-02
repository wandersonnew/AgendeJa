<?php
    namespace App\Controllers;
    use Src\Controller\Action;
    use Src\Model\Container;

    use App\Models\Medicalclinic;

    class MedicalclinicController extends Action {
        public function register() {
            $clinic = Container::getModel('Medicalclinic');
            $clinic->__set('name', $_POST['name']);
            $clinic->__set('email', $_POST['email']);
            $clinic->__set('tel', $_POST['tel']);
            $clinic->__set('address', $_POST['address']);
            $clinic->__set('cnpj', $_POST['cnpj']);
            $result = $clinic->verifyName();
            if($result == NULL) {
                $clinic->toregister();
                header('Location: /doctor/clinic?registered=true');
            } else {
                header('Location: /doctor/clinic?registered=false');
            }
        }

        public function selectAllClinics() {
            $clinic = Container::getModel('Medicalclinic');
            return $clinic->selectAll();
        }

        public function select($id) {
            $clinic = Container::getModel('Medicalclinic');
            $clinic->__set('id_medclinic', $id);
            return $clinic->selectId();
        }

        public function update() {
            $clinic = Container::getModel('Medicalclinic');
            $clinic->__set('id_medclinic', $_POST['id_medclinic']);
            $clinic->__set('name', $_POST['name']);
            $clinic->__set('email', $_POST['email']);
            $clinic->__set('tel', $_POST['tel']);
            $clinic->__set('address', $_POST['address']);
            $clinic->__set('cnpj', $_POST['cnpj']);
            
            $result = $clinic->update();
            
            if($result != NULL) {
                header('Location: /doctor/clinic?update=true');
            } else {
                header('Location:/doctor/editclinic/'.$_POST['id_medclinic'].'?update=erro');
            }
        }

    }

//#doctorAdmin1000