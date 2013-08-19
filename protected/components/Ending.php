<?php
class Ending extends CComponent{
    public static function Order($count){
        $ending='';
        $count = substr($count,-2);
        $number = floor($count/10);
        $left   = $count%10;
        if($number==1)
            $ending = 'ов';
        else{
        if($left<1||$left>=5)
            $ending = 'ов';
        else if($left>1&&$left<5)
            $ending = 'а';
        }
        return $ending;
    }
    public static function Days($count){
        $ending='';
        $count = substr($count,-2);
        $number = floor($count/10);
        $left   = $count%10;
        if($number==1)
            $ending = 'дней';
        else{
            if($left==1)
                $ending = 'день';
            else if($left<1||$left>=5)
                $ending = 'дней';
            else if($left>1&&$left<5)
                $ending = 'дня';
        }
        return $count.' '.$ending;
    }
}
