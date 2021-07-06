<?php
    namespace App\Controllers;
    use Src\Controller\Action;
    use Src\Model\Container;

    //use App\Models\Doctor;

    class CalendarController extends Action {
        public function getDate() {
            if(isset($_GET['date'])){
                $date = date($_GET['date'] . "-" . 01);
                $lastSunday = date("Y-m-d", strtotime($date . 'last sunday'));
                return $lastSunday;
            } 
            $date = getdate()['year'] . "-" . getdate()['mon'] . "-" . 01;
            $lastSunday = date("Y-m-d", strtotime($date . 'last sunday'));
            return $lastSunday;
            
        }

        public function getPrev() {
            $currentDate = explode("-", $this->getDate());
            $date = $currentDate[0] . "-" . $currentDate[1];
            return $date;
        }

        public function getNext() {
            $currentDate = explode("-", $this->getDate());
            $date = $currentDate[0] . "-" . ($currentDate[1] + 2);
            return $date;
        }
    }