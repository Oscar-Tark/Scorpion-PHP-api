<?php
class Dates
{
    function check_format($date, $format)
    {
        if(strcmp($date, date($format, strtotime($date))) == 0)
            return true;
        return false;
    }

    function to_sql_date($date)
    {
        return date("Y-m-d", strtotime($date));
    }

    function to_sql_datetime($datetime)
    {
        return date("Y-m-d h:i:s", strtotime($datetime));
    }
    
    function date_today()
    {
		return date("Y_m_d");
	}
	
	function date_today_customseperator($seperator)
	{
		return date("Y" . $seperator . "m" . $seperator . "d");
	}
	
	function add_hours($time, $hours)
	{
		return date("H:i", strtotime($time . " +".$hours."hours"));
	}
	
	function add_week($time, $weeks)
	{
		return date("Y-m-d", strtotime($time . " +".$weeks."week"));
	}
	
	function to_time($datetime)
	{
        return date("H:i", strtotime($datetime));
	}
	
	//For javascript
	function date_todayjs()
	{
		return date("Y-m-d");
	}
	
	function timestamp()
	{
		return date('Y-m-d H:i:s');
	}
}
?>
