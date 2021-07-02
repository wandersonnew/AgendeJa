<?php
    namespace App\Controllers;
    use Src\Controller\Action;
    use Src\Model\Container;

    class IndexController extends Action {
        public function home() {
            $this->render('home', 'layout1');
        }
    }
?>