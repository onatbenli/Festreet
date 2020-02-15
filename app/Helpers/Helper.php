<?php
namespace App\Helpers;

class Helper{

    public static function toupper(string $string)
    {
        return strtoupper($string);
    }

    /*
     * Using
     * Helper::alert('message','success',5000,'bottom-left')
     * Helper::alert('message')
     */
    public static function alert($message = "" ,$type = "default",$time = 4000,$position="bottom-right"){
        return session()->flash('alert',[
            'message' => $message,
            'type' => $type,
            'time' => $time,
            'position' => $position
        ]);
    }

}
