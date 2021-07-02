<?php
    namespace App\Controllers;
    use Src\Controller\Action;
    use Src\Model\Container;

    use App\Models\Doctor;
    use App\Controllers\SecretaryController;

    class DoctorController extends Action {
        //Métodos do Doutor
        public function home() {
            if($this->doctorAuth()) {
                $this->render('home', 'layout1');
            }
        }

        public function login() {
            $this->render('login', 'layout1'); 
        }

        public function tologin() {
            $doctor = Container::getModel('Doctor');
            $doctor->__set('email', $_POST['email']);
            $doctor->__set('password', $_POST['password']);
            $result = $doctor->verifyEmail();
            if (
                $result[0]['email'] == $doctor->__get('email') &&
                password_verify($doctor->__get('password'), $result[0]['password'])
            ) {
                session_start();
                $_SESSION['emaildoctor'] = $doctor->__get('email');
                $_SESSION['namedoctor'] = $doctor->__get('name');
                header('Location: /doctor');
            } else {
                header('Location: /doctor/login?login=false');
            }
        }

        public function logout() {
            session_start();
            session_destroy();
            header('Location: /doctor/login');
        }

        public function doctorAuth() {
            session_start();
            if($_SESSION['emaildoctor']) {
                return true;
            }
            header('Location: /doctor/login');
        }


        //Gerenciamento de secretárias
        public function secretary() {
            if($this->doctorAuth()) {
                $secretary = new SecretaryController();
                $this->view->secretaries = $secretary->selectAllSecretaries();
                $clinic = new MedicalclinicController();
                $this->view->clinics = $clinic->selectAllClinics();
                $this->render('secretaries', 'layout1');
            }
        }

        public function registersecretary() {
            $secretary = new SecretaryController();
            $secretary->register();
        }

        public function editSecretary($id) {
            $clinic = new MedicalclinicController();
            $this->view->clinics = $clinic->selectAllClinics();
            $secretary = new SecretaryController();
            $this->view->secretary = $secretary->select($id);
            $this->render('editsecretary', 'layout1');
        }

        public function updateSecretary() {
            $secretary = new SecretaryController();
            $secretary->update();
        }


        //Gerenciamente de clínicas
        public function clinic() {
            if($this->doctorAuth()) {
                $clinic = new MedicalclinicController();
                $this->view->clinics = $clinic->selectAllClinics();
                $this->render('medicalclinic', 'layout1');
            }
        }

        public function registerclinic() {
            $clinic = new MedicalclinicController();
            $clinic->register();
        }

        public function editClinic($id) {
            $clinic = new MedicalclinicController();
            $this->view->clinic = $clinic->select($id);
            $this->render('editmedicalclinic', 'layout1');
        }

        public function updateClinic() {
            $clinic = new MedicalclinicController();
            $clinic->update();
        }

        

    }

/*

#doctorAdmin1000

$2y$10$aWmqDEiL6xKLILk9HGsuVO/iUwhs7OqQ04haQuAJXdEuevn5OaF5y

INSERT INTO doctors (name, email, tel, password) VALUES(
    "Wanderson Duarte Alves",
    "wandersondrtlvs.new@gmail.com",
    "(88) 99306-2344",
    "$2y$10$aWmqDEiL6xKLILk9HGsuVO/iUwhs7OqQ04haQuAJXdEuevn5OaF5y"
);

*/