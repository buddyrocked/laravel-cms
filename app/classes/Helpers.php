<?php
class Helpers {
    public static function doMessage() {
        $message = 'Hello';
        return $message;
    }

    public static function setting($key){
    	$setting = Setting::where('key', '=', $key)->first();
    	if($setting):
    		return $setting->value;
    	else:
    		return '';
    	endif;
    }
}