<?php

namespace App\Utilities;
header("Content-Type:text/html; charset=utf-8"); //set utf-8 encoding
date_default_timezone_set('UTC');

//自行編寫的日期物件，方便處理，TDate is represented for Taroko Date Object
class DateLib
{
	private $mDay, $mMonth, $mYear, $mHour, $mMinute, $mSecond;
	private $dayInc, $monthInc, $yearInc, $weekInc, $hourInc, $minuteInc, $secondInc;

    public function __construct($year, $month, $day, $hour = "0", $minute = "0", $second = "0")
    {
    	if($month == null)
    		$month = "1";
    	if($day == null)
    		$day = "1";
    	$this->dayInc = 0;
    	$this->monthInc = 0;
    	$this->yearInc = 0;
    	$this->weekInc = 0;
    	$this->hourInc = 0;
    	$this->minuteInc = 0;
    	$this->secondInc = 0;

		$this->mDay = $day;
		$this->mMonth = $month;
		$this->mYear = $year;
		$this->mHour = $hour;
		$this->mMinute = $minute;
		$this->mSecond = $second;
    }    

	public function ModifyDay($count)
	{
		$this->dayInc += $count;
		return $this;
	}

	public function ModifyMonth($count)
	{
		$this->monthInc += $count;
		return $this;
	}

	public function ModifyYear($count)
	{
		$this->yearInc += $count;
		return $this;
	}

	public function ModifyWeek($count)
	{
		$this->weekInc += $count;
		return $this;
	}

	public function ModifyHour($count)
	{
		$this->hourInc += $count;
		return $this;
	}

	public function ModifyMinute($count)
	{
		$this->minuteInc += $count;
		return $this;
	}

	public function ModifySecond($count)
	{
		$this->secondInc += $count;
		return $this;
	}

	public function Modify($year, $month, $week, $day)
	{
		$this->ModifyYear($year);
		$this->ModifyMonth($month);
		$this->ModifyWeek($week);
		$this->ModifyDay($day);
		return $this;
	}

	public function ModifyTime($hour, $minute, $second)
	{
		$this->ModifyHour($hour);
		$this->ModifyMinute($minute);
		$this->ModifySecond($second);
		return $this;
	}

	public function GetModifiedDate()
	{
		$str = $this->mDay . "-" . 
			   $this->mMonth . "-" . 
			   $this->mYear . " + " . 
			   $this->dayInc . " day + " . 
			   $this->weekInc . " week + " . 
			   $this->monthInc . " month + " . 
			   $this->yearInc . " year";

		$ret = strtotime(str_replace('+ -', '-', $str));
		return date('20y-m-d', $ret);
	}

	public function GetModifiedFullDate()
	{
		$str = $this->mDay . "-" . 
			   $this->mMonth . "-" . 
			   $this->mYear . " " . 
			   $this->mHour . ":" . 
			   $this->mMinute . ":" . 
			   $this->mSecond . " + " . 
			   $this->dayInc . " day + " . 
			   $this->weekInc . " week + " . 
			   $this->monthInc . " month + " . 
			   $this->yearInc . " year + " . 
			   $this->hourInc . " hour + " . 
			   $this->minuteInc . " minute + " . 
			   $this->secondInc . " second";

		$ret = strtotime(str_replace('+ -', '-', $str));
		return date('20y-m-d H:i:s', $ret);
	}

	public static function MakeDate($dateString, $dateDelimeter, $timeDelimeter)
	{
		$splits = explode(' ', $dateString);
		$dateSplit = explode($dateDelimeter, $splits[0]);
		$timeSplit = explode($timeDelimeter, $splits[1]);

		$ret = new TDate(
			$dateSplit[0], 
			$dateSplit[1], 
			$dateSplit[2], 
			$timeSplit[0], 
			$timeSplit[1], 
			$timeSplit[2]);
		return $ret;
	}


	public static function SecondBetweenDays($date1, $date2)
	{  
	    $date1 = strtotime($date1);  
	    $date2 = strtotime($date2);  
	    $days = floor(abs($date1 - $date2));  
	    return $days;  
	} 
}


//將yyyy:mm:dd hh:mm:ss分割
//flag 可為time，只取時間部分，或為fullDay，表示完整yyyy:mm:dd
//或者day，只取dd，month只取mm，year只取yyyy，month_day取mm::dd，year_month取yyyy::mm
function ProcessDateData($date, $flag)
{
	if($flag == "none") //完整
		return $date;
	$dateAndTime = explode(' ', $date);
	if($flag == "time") //取時間
		return $dateAndTime[1];
	else if($flag == "fullDay") //年、月、日
		return $dateAndTime[0];
	else
	{
		$YMD = explode('-', $dateAndTime[0]);
		if($flag == "year") //只取年
			return $YMD[0];
		else if($flag == "month") //只取月
			return $YMD[1];
		else if($flag == "day") //只取日
			return $YMD[2];
		else if($flag == "month_day") //取月、日
			return $YMD[1] . '-' . $YMD[2];
		else if($flag == "year_month") //取年、月
			return $YMD[0] . '-' . $YMD[1];
	}
	return null;
}

function HourBetweenDays($date1, $date2)
{  
    $date1 = strtotime($date1);  
    $date2 = strtotime($date2);  
    $days = floor(abs($date1 - $date2)/3600);  
    return $days;  
} 


?>