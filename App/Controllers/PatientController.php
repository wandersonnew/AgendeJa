<?php
    namespace App\Controllers;
    use Src\Controller\Action;
    use Src\Model\Container;

    use App\Models\Patient;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


    class PatientController extends Action {
        public function register() {
            $this->render('register', 'layout1');
        }

        public function toregister() {
            $patient = Container::getModel('Patient');
            $patient->__set('name', $_POST['name']);
            $patient->__set('email', $_POST['email']);
            $patient->__set('tel', $_POST['tel']);
            $patient->__set('address', $_POST['address']);
            $patient->__set('password', password_hash($_POST['password'], PASSWORD_DEFAULT));
            $result = $patient->verifyEmail();
            if($result[0]['email'] != $patient->__get('email')) {
                $patient->toregister();
                header('Location: /patient/login?registered=true');
            } else {
                header('Location: /patient/register?registered=false');
            }
        }

        public function login() {
            $this->render('login', 'layout1'); 
        }

        public function tologin() {
            $patient = Container::getModel('Patient');
            $patient->__set('email', $_POST['email']);
            $patient->__set('password', $_POST['password']);
            $result = $patient->verifyEmail();
            if (
                $result[0]['email'] == $patient->__get('email') &&
                password_verify($patient->__get('password'), $result[0]['password'])
            ) {
                session_start();
                $_SESSION['email'] = $patient->__get('email');
                header('Location: /');
            } else {
                header('Location: /patient/login?login=false');
            }
        }

        public function logout() {
            session_start();
            session_destroy();
            header('Location: /');
        }

        public function recoverpass() {
            $this->render('recoverpass', 'layout1');
        }

        public function torecoverpass() {
            var_dump($_POST);

        }

        public function edit($id) {
            echo $id;
        }
    }


    //$this->view->dados = "test";