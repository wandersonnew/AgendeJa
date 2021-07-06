<?php
    namespace App\Controllers;
    use Src\Controller\Action;
    use Src\Model\Container;

    use App\Controllers\CalendarController;

    class IndexController extends Action {
        public function home() {
            $calendar = new CalendarController();
            $this->view->date = $calendar->getDate();
            $this->view->prev = $calendar->getPrev();
            $this->view->next = $calendar->getNext();
            $this->render('home', 'layout1');
        }
    }
?>