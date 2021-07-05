<?php
    namespace App\Controllers;
    use Src\Controller\Action;
    use Src\Model\Container;

    use App\Models\Secretary;

    class SecretaryController extends Action {
        public function home() {
            if($this->secretaryAuth()) {
                $this->render('home', 'layout1');
            }
        }

        public function login() {
            $this->render('login', 'layout1'); 
        }

        public function tologin() {
            $secretary = Container::getModel('Secretary');
            $secretary->__set('email', $_POST['email']);
            $secretary->__set('password', $_POST['password']);
            $result = $secretary->verifyEmailActive();
            if (
                $result[0]['email'] == $secretary->__get('email') &&
                password_verify($secretary->__get('password'), $result[0]['password'])
            ) {
                session_start();
                $_SESSION['emailsecretary'] = $secretary->__get('email');
                $_SESSION['namesecretary'] = $secretary->__get('name');
                header('Location: /secretary');
            } else {
                header('Location: /secretary/login?login=false');
            }
        }

        public function logout() {
            session_start();
            session_destroy();
            header('Location: /secretary/login');
        }

        public function secretaryAuth() {
            session_start();
            if($_SESSION['emailsecretary']) {
                return true;
            }
            header('Location: /secretary/login');
        }

        public function register() {
            $secretary = Container::getModel('Secretary');
            $secretary->__set('name', $_POST['name']);
            $secretary->__set('email', $_POST['email']);
            $secretary->__set('tel', $_POST['tel']);
            $secretary->__set('password', password_hash($_POST['password'], PASSWORD_DEFAULT));
            
            if(isset($_POST['is_super'])) {
                $secretary->__set('is_super', true);
            }
            
            $secretary->__set('id_medclinic', $_POST['id_medclinic']);
            
            $result = $secretary->verifyEmail();

            if($result == NULL) {
                $secretary->toregister();
                header('Location: /doctor/secretary?registered=true');
            } else {
                header('Location: /doctor/secretary?registered=false');
            }
        }

        public function selectAllSecretaries() {
            $secretary = Container::getModel('Secretary');
            return $secretary->selectAll();
        }

        public function select($id) {
            $secretary = Container::getModel('Secretary');
            $secretary->__set('id_secretary', $id);
            return $secretary->selectId();
        }

        public function update() {
            $secretary = Container::getModel('Secretary');
            $secretary->__set('id_secretary', $_POST['id_secretary']);
            $secretary->__set('name', $_POST['name']);
            $secretary->__set('email', $_POST['email']);
            $secretary->__set('tel', $_POST['tel']);
            $secretary->__set('password', password_hash($_POST['password'], PASSWORD_DEFAULT));
            
            if(isset($_POST['is_super'])) {
                $secretary->__set('is_super', true);
            }
            
            $secretary->__set('id_medclinic', $_POST['id_medclinic']);
            
            $result = $secretary->update();

            if($result != NULL) {
                header('Location: /doctor/secretary?update=true');
            } else {
                header('Location:/doctor/editsecretary/'.$_POST['id_secretary'].'?update=erro');
            }
        }

        public function delete($id) {
            $secretary = Container::getModel('Secretary');
            $secretary->__set('id_secretary', $id);

            $result = $secretary->delete();

            if($result != NULL) {
                header('Location: /doctor/secretary');
            }
        }
    }