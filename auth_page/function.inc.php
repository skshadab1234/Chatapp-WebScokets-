<?php
    function formatTimeString($timeStamp) {
        $str_time = date("Y-m-d H:i:sP", strtotime($timeStamp));
        $time = strtotime($str_time);
        $d = new DateTime($str_time);
        
        
        $weekDays = ['Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat', 'Sun'];
        $months = ['Jan', 'Feb', 'Mar', 'Apr', ' May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
        
        if($timeStamp != '') {
            if ($time > strtotime('-2 minutes')) {
                return 'Just now';
              } elseif ($time > strtotime('-59 minutes')) {
                $min_diff = floor((strtotime('now') - $time) / 60);
                return $min_diff . ' min' . (($min_diff != 1) ? "s" : "") . ' ago';
              } elseif ($time > strtotime('-23 hours')) {
                $hour_diff = floor((strtotime('now') - $time) / (60 * 60));
                return $hour_diff . ' hour' . (($hour_diff != 1) ? "s" : "") . ' ago';
              } elseif ($time > strtotime('today')) {
                return $d->format('g:i A');
              } elseif ($time > strtotime('yesterday')) {
                return 'Yesterday at ' . $d->format('g:i A');
              } elseif ($time > strtotime('this week')) {
                return $weekDays[$d->format('N') - 1] . ' at ' . $d->format('g:i A');
              } else {
                return $d->format('j') . ' ' . $months[$d->format('n') - 1] .
                (($d->format('Y') != date("Y")) ? $d->format(' Y') : "") .
                ' at ' . $d->format('g:i A');
              }
        }
        
    }
?>