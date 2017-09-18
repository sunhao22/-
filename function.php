<?php
	
	/**
	 * [显示序列化的数组]
	 * @param  array  $a [要序列化的数组]
	 * @return void    
	 */
	function array_a(array $a){
		echo serialize($a);
	}
	//$a = array(780,776);
	//array_a($a);
	
	/*
	 * 设置时区
	 */
	//ini_set('date.timezone','Asia/Shanghai');
	
	/**
	 * 标准字符串时间转换时间戳（只有日期就是当天的00:00:00）
	 */
	// $data = strtotime('2017-8-17');
	// $data += 86399;
	// echo $data;

	/**
	 * 获取本月开始和结束时间
	 * @param  string $date Y-m
	 * @return 开始和结束时间
	 */
	function getMonth($date){
  		$firstday = date("Y-m-01",strtotime($date));
  		$lastday = date("Y-m-d",strtotime("$firstday +1 month -1 day"));
  		return array($firstday,$lastday);
	}

	/**
	 * 获取上个月开始和结束时间
	 * @param  string $date Y-m
	 * @return 开始和结束时间
	 */
	function getlastMonthDays($date){
  		$timestamp=strtotime($date);
  		$firstday=date('Y-m-01',strtotime(date('Y',$timestamp).'-'.(date('m',$timestamp)-1).'-01'));
  		$lastday=date('Y-m-d',strtotime("$firstday +1 month -1 day"));
  		return array($firstday,$lastday);
	}

	/**
	 * 获取下个月开始和结束时间
	 * @param  string $date Y-m
	 * @return 开始和结束时间
	 */
	function getNextMonthDays($date){
  		$timestamp=strtotime($date);
  		$arr=getdate($timestamp);

  		if($arr['mon'] == 12){
    		$year=$arr['year'] +1;
    		$month=$arr['mon'] -11;
    		$firstday=$year.'-0'.$month.'-01';
    		$lastday=date('Y-m-d',strtotime("$firstday +1 month -1 day"));
  		}else{
    		$firstday=date('Y-m-01',strtotime(date('Y',$timestamp).'-'.(date('m',$timestamp)+1).'-01'));
    		$lastday=date('Y-m-d',strtotime("$firstday +1 month -1 day"));
  		}

  		return array($firstday,$lastday);
	}