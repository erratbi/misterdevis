<?php

/**
 * Auth_Model_Calendar
 */
class Custom_Calendar
{

    protected $_now; //todays date
    protected $_focusDate; //date in focus
    protected $_focusMonthNames;
    protected $_focusMonthDayNames;
    protected $_focusMonthNumDays;
    protected $_focusMonthFirstDayOfWeek;
    protected $_focusMonthNumWeeks;
    protected $_validDates; //months in range of now
    protected $_nextMonth;
    protected $_prevMonth;

    /**
     * @param String $date
     */
    public function __construct($years, $month)
    {
        $this->_now = Zend_Date::now(); //today

        $this->setFocusDate($years, $month);
    }

    /**
     * Sets the month in focus, i.e. the month being displayed in the calendar
     *
     * @param String $date
     */
    public function setFocusDate($years, $month)
    {
        //
        $this->_focusDate = new Zend_Date($month . ' ' . $years, "M yy");

        //date params
        $this->_initServiceDateParams($this->_focusDate);
    }

    /**
     * Sets up the Calendar Service's params
     * @param Zend_Date $date
     */
    protected function _initServiceDateParams(Zend_Date $date)
    {
        $this->_focusMonthNames = Zend_Locale::getTranslationList('Month'); //locale month list
        $this->_focusMonthDayNames = Zend_Locale::getTranslationList('Day'); //locale day list
        $this->setValidDates();
        $this->_focusMonthNumDays = $date->get(Zend_Date::MONTH_DAYS);
        $this->_setNextMonth($date);
        $this->_setPrevMonth($date);
        $this->_focusMonthFirstDayOfWeek = $date->get(Zend_Date::WEEKDAY_DIGIT) > 0 ? $date->get(Zend_Date::WEEKDAY_DIGIT) : 7;
        $this->_focusMonthNumWeeks = ceil(($this->getFocusMonthFirstDayOfWeek() + $this->getFocusMonthNumDays()) / 7);

        // fix day list order (first element will be Monday and not Sunday)
        if (isset($this->_focusMonthDayNames['sun'])) {
            $curday = $this->_focusMonthDayNames['sun'];
            unset($this->_focusMonthDayNames['sun']);
            $this->_focusMonthDayNames['sun'] = $curday;
            $this->_focusMonthFirstDayOfWeek--;
        }
    }

    /**
     * Sets an aarray of months in range of the month we're physically in (i.e. NOW)
     * @param int $startOffset
     * @param int $endOffset
     */
    public function setValidDates($startOffset = -11, $endOffset = 11)
    {
        $tmp = clone $this->_focusDate;
        $startMonth = $tmp->subMonth(abs($startOffset));

        $this->_validDates = array();
        array_push($this->_validDates, $startMonth);

        $tmp = clone $startMonth;
        for ($i = 0; $i < (abs($startOffset) + abs($endOffset)); $i++) {
            $nextMonth = $tmp->addMonth(1);
            array_push($this->_validDates, $nextMonth);
            $tmp = clone $nextMonth;
        }
        unset($tmp);
    }

    /**
     * Sets the next month (after the focus date)
     * @param Zend_Date $date
     */
    protected function _setNextMonth(Zend_Date $date)
    {
        $focusDateClone = clone $date;
        $this->_nextMonth = $focusDateClone->addMonth(1);
    }

    /**
     * Sets the prev month (before the focus date)
     * @param Zend_Date $date
     */
    protected function _setPrevMonth(Zend_Date $date)
    {
        $focusDateClone = clone $date;
        $this->_prevMonth = $focusDateClone->subMonth(1);
    }

    /**
     * @param String $controller
     * @param String $action
     * @return Array $calHeader
     */
    public function getCalendarHeaderDataArray($controller = null, $action = null)
    {
        $calHeader = array();
        $focusDate = $this->getFocusDate()->get("MMM yyyy");

        foreach ($this->getValidDates() as $date) {
            $arr = array();
            $arr['id'] = ($date->get('MMM yyyy') == $focusDate) ? 'selected-month' : $date->get('MMMyyyy');
            if (null == $controller && null !== $action) {
                $arr['url'] = array(
                    'controller' => $controller,
                    'action' => $action,
                    'month' => $date->get('M'),
                    'year' => $date->get('yyyy')
                );
            } else {
                $arr['url'] = array(
                    'month' => $date->get('M'),
                    'year' => $date->get('yyyy')
                );
            }

            $arr['text'] = $date->get('MMM yyyy');
            array_push($calHeader, $arr);
        }
        return $calHeader;
    }

    /**
     * @return Array $calWeekdays
     */
    public function getCalendarWeekdayDataArray()
    {
        $c = 1;
        $calWeekdays = array();
        foreach ($this->getFocusMonthDayNames() as $dayShort => $day_long) {
            $class = '';
            if ($c == 1) {
                $class .= 'first';
            } elseif ($c == 7) {
                $class .= 'last';
            }
            $c++;
            array_push($calWeekdays, array(
                'class' => $class,
                'dayShortStr' => strtoupper($day_long)
            ));
        }
        return $calWeekdays;
    }

    /**
     * @return Integer $DayBeforeFocus
     */
    public function getDayBeforeFocus()
    {
        return (int) date('N', $this->getFocusDate()->getTimestamp()) - 1;
    }

    /**
     * @return Integer $DayAfterFocus
     */
    public function getDayAfterFocus()
    {
        $newDate = mktime(0, 0, -1, $this->getFocusDate()->get('M') + 1, $this->getFocusDate()->get('d'), $this->getFocusDate()->get('Y'));
        $DayAfterFocus = 7 - date('N', $newDate);

        return (int) $DayAfterFocus;
    }

    public function getStartDate()
    {
        return new Zend_Date(mktime(0, 0, 0, $this->getFocusDate()->get("M"), -$this->getDayBeforeFocus() - 1, $this->getFocusDate()->get("y")));
    }

    public function getEndDate()
    {

        $time = new Zend_Date(mktime(0, 0, -1, $this->getFocusDate()->get("M"), $this->getDayAfterFocus() + 1, $this->getFocusDate()->get("y")));
        $time->addMonth(1);
        return $time;
    }

    /**
     * @return Array $calMonthDays
     */
    public function getCalendarMonthDayDataArray($data = null)
    {
        $calMonthDays = array();
        $nowTime = date('U', mktime(0, 0, 0, date('m'), date('j'), date('Y')));
        $monthDate = $this->getFocusDate()->get("MM");
        $yearDate = $this->getFocusDate()->get("yyyy");

        $dayBeforeFocus = $this->getDayBeforeFocus();
        $dayBeforeFocus = ($dayBeforeFocus >= 0) ? - $dayBeforeFocus + 1 : $dayBeforeFocus;

        for ($i = 0; $i < $this->getFocusMonthNumWeeks(); $i++) {
            $weekArr = array();
            for ($j = 0; $j < 7; $j++) {
                $cellNum = ($i * 7 + $j);
                $curTime = mktime(0, 0, 0, $monthDate, $dayBeforeFocus + $cellNum, $yearDate);
                $curMonth = date('m', $curTime);
                $curYear = date('Y', $curTime);
                $curYear = date('Y', $curTime);
                $curDay = date('d', $curTime);
                $curDayInt = (int) $curDay;
                $curDate = $curYear . $curMonth . $curDay;

                $dayArr = array(
                    'class' => 'calendar-padding-right',
                    'num' => $curDayInt,
                    'timestamp' => mktime(0, 0, 0, $curMonth, $curDayInt, $curYear)
                );

                if ($curTime == $nowTime) {
                    $dayArr['class'] .= ' today';
                } else if ($curYear < $yearDate || $curMonth < $monthDate) {
                    $dayArr['class'] .= ' prev-month';
                } else if ($curYear > $yearDate || $curMonth > $monthDate) {
                    $dayArr['class'] .= ' next-month';
                } else if ($curTime < $nowTime) {
                    $dayArr['class'] .= ' prev-days';
                } else if ($curTime > $nowTime) {
                    $dayArr['class'] .= ' next-days';
                }

                if (is_array($data) && isset($data[$curDate])) {
                    $dayArr['estimate'] = $data[$curDate];
                }

                array_push($weekArr, $dayArr);
            }
            array_push($calMonthDays, $weekArr);
        }

        return $calMonthDays;
    }

    public function ArraySearchRecursive($Needle, $Haystack, $NeedleKey = "", $Strict = false, $Path = array())
    {
        if (!is_array($Haystack)) {
            return false;
        }

        foreach ($Haystack as $Key => $Val) {
            if (is_array($Val) && $SubPath = self::ArraySearchRecursive($Needle, $Val, $NeedleKey, $Strict, $Path)) {
                $Path = array_merge($Path, Array($Key), $SubPath);
                return $Path;
            } else if ((!$Strict && $Val == $Needle && $Key == (strlen($NeedleKey) > 0 ? $NeedleKey : $Key)) || ($Strict && $Val === $Needle && $Key == (strlen($NeedleKey) > 0 ? $NeedleKey : $Key))) {
                $Path[] = $Key;
                return $Path;
            }
        }
        return false;
    }

    /**
     * @return Zend_Date
     */
    public function getNow()
    {
        return $this->_now;
    }

    /**
     * @return Zend_Date
     */
    public function getFocusDate()
    {
        return $this->_focusDate;
    }

    /**
     * @return Array
     */
    public function getFocusMonthNames()
    {
        return $this->_focusMonthNames;
    }

    /**
     * @return Array
     */
    public function getFocusMonthDayNames()
    {
        return $this->_focusMonthDayNames;
    }

    /**
     * @return Array
     */
    public function getValidDates()
    {
        return $this->_validDates;
    }

    /**
     * @return int
     */
    public function getFocusMonthNumDays()
    {
        return $this->_focusMonthNumDays;
    }

    /**
     * @return int
     */
    public function getFocusMonthFirstDayOfWeek()
    {
        return $this->_focusMonthFirstDayOfWeek;
    }

    /**
     * @return int
     */
    public function getFocusMonthNumWeeks()
    {
        return $this->_focusMonthNumWeeks;
    }

    /**
     * @return Zend_Date
     */
    public function getNextMonth()
    {
        return $this->_nextMonth;
    }

    /**
     * @return Zend_Date
     */
    public function getPrevMonth()
    {
        return $this->_prevMonth;
    }

}
