<?php

/**
 * Auth Calendar Controller
 *
 *
 * @author          IDMANSOUR AZIZ
 * @package       Auth Module
 *
 */
class Auth_CalendarController extends Zend_Controller_Action
{

    public function indexAction()
    {

        $this->_helper->layout->setLayout( 'layout_fo_ehcg' );
        //$this->_helper->layout()->disableLayout();
        // Request params
        $request = $this->getRequest();
        $month = $request->getParam('month', date('m'));
        $year = $request->getParam('year', date('Y'));

        // CalendarService
        $calendar = new Custom_Calendar($year, $month);
        $calendar->setValidDates(-1, 1);

        $startdate = $calendar->getStartDate()->toString('yyyy-MM-dd');
        $enddate = $calendar->getEndDate()->toString('yyyy-MM-dd');
        //echo $calendar->getEndDate()->toString('yyyy-MM-dd');
        //exit;
        //1 month back, 1 month forward
        //$estimate = $this->getRequest()->_em->getRepository('Auth_Model_Estimate')
        //        ->findAndSortByDate($startdate, $enddate);

        /*

        
          print_r($estimate);
          exit;

          var_dump($calendar->getStartDate()->toString()) ;
          var_dump($calendar->getEndDate()->toString()) ;
          exit;
         */


        //$estimateTooltip = $this->getRequest()->_em->getRepository('Auth_Model_Estimate')
        //        ->findByDateEstimateTooltip($startdate, $enddate);



        // Build the estimate tooltip data
        //$this->view->estimateTooltip = $estimateTooltip;

        // Build the calendar header data
        $this->view->calHeader = $calendar->getCalendarHeaderDataArray('calendar', 'view');

        // Build the calendar weekdays data
        $this->view->calWeekdays = $calendar->getCalendarWeekdayDataArray();

        // Build the calendar monthdays data
        //echo 'test Time'; exit;
        //$newEst = array();
        //foreach($estimate as $key => $value){
        //uasort($value, array('Auth_CalendarController','sortEstimate'));
        //$newEst[$key] = $value;
        //}

        $this->view->calMonthDays = $calendar->getCalendarMonthDayDataArray($estimate);
    }

    private function sortEstimate($a, $b)
    {

        $indexa = $this->setIndexEstimate($a);
        $indexb = $this->setIndexEstimate($b);
        if ($indexa == $indexb)
            return 0;
        return ($indexa > $indexb) ? 1 : -1;
    }

    private function setIndexEstimate($a)
    {

        // soldé
        if ($a['typeestimate'] == 'solde') {
            return 1;
        }
        // a soldé
        if ($a['typeestimate'] == 'confirme' && (time() > strtotime($a['deliverydateestimate']))) {
            return 2;
        }
        //en attente
        if ($a['typeestimate'] == 'attente') {
            return 3;
        }
        //confirmé
        if ($a['typeestimate'] == 'confirme') {
            return 4;
        }
        // annuler
        if ($a['typeestimate'] == "annule") {
            return 5;
        }
    }

}
