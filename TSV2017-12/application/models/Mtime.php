<?php
class Mtime extends CI_Model{

    public function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }

    public function time_stamp($time_ago) {
        $cur_time=time();
        $time_elapsed = $cur_time - $time_ago;
        $seconds = $time_elapsed ;
        $minutes = round($time_elapsed / 60 );
        $hours = round($time_elapsed / 3600);
        $days = round($time_elapsed / 86400 );
        $weeks = round($time_elapsed / 604800);
        $months = round($time_elapsed / 2600640 );
        $years = round($time_elapsed / 31207680 );
        // Future
        if($cur_time < $time_ago) {
            echo " Thời gian chưa diễn ra ";
        }
        // Now
        else if($cur_time == $time_ago) {
            echo " Đang diễn ra ";
        }
        // Seconds
        else if($seconds <= 60) {
            echo " Cách đây $seconds giây ";
        }
        //Minutes
        else if($minutes <=60) {
            if($minutes==1) {
                echo " Cách đây 1 phút ";
            }
            else {
                echo " Cách đây $minutes phút";
            }
        }
        //Hours
        else if($hours <=24) {
            if($hours==1) {
                echo "Cách đây 1 tiếng ";
            }
            else {
                echo " Cách đây  $hours tiếng ";
            }
        }
        //Days
        else if($days <= 7) {
            if($days==1) {
                echo " Ngày hôm qua ";
            }
            else {
                echo " Cách đây  $days ngày ";
            }
        }
        //Weeks
        else if($weeks <= 4.3) {
            if($weeks==1) {
                echo " Cách đây 1 tuần ";
            }
            else {
                echo " Cách đây  $weeks tuần";
            }
        }
        //Months
        else if($months <=12) {
            if($months==1) {
                echo " Cách đây 1 tháng ";
            }
            else {
                echo " Cách đây $months tháng";
            }
        }
        //Years
        else {
            if($years==1) {
                echo " Cách đây 1 năm ";
            }
            else {
                echo " Cách đây $years năm ";
            }
        }
    }

    public function currentEvent($time_start)
    {
        $cur_time=time();
        $time = $time_start - $cur_time;
        $days = round($time / 86400 );
        $weeks = round($time / 604800);
        if ($time >= 0) {
          if ($weeks <= 1) {
            if ($days <= 1) {
              return 1; // Đang diễn ra
            } else return 2; // Diễn ra trong tương lai gần (1 tuần)
          } else return 3; // Diễn ra trong tương lai (nhiều hơn 1 tuần)
        } else return 0; // Đã diễn ra sự kiện vài phút trước trở lên
    }
}
