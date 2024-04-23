<?php

use App\Models\Activity;

//for count Notification
function notificationCount() {
    $activitiesCount = (new Activity())->getActivitiesCount();
    
    return $activitiesCount;
}

function indianMoney($amount){
    $amount = $amount;
    $amount = str_replace(',', '', $amount);
    $lastThree = substr($amount, strlen($amount)-3); 
    $amount = substr($amount, 0, -3); 
    $amount = moneyFormatIndia( $amount );
    
    return $amount.$lastThree;
}

function moneyFormatIndia($num) {
    $explrestunits = "" ;
    if(strlen($num)>3) {
        $lastthree = substr($num, strlen($num)-3, strlen($num));
        $restunits = substr($num, 0, strlen($num)-3);
        $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits;
        $expunit = str_split($restunits, 2);
        for($i=0; $i<sizeof($expunit); $i++) {
            if($i==0) {
                $explrestunits .= (int)$expunit[$i].",";
            } else {
                $explrestunits .= $expunit[$i].",";
            }
        }
        $thecash = $explrestunits.$lastthree;
    } else {
        $thecash = $num;
    }
    return $thecash;
}
