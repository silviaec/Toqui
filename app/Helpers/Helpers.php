<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

class Helper
{
    public static function convertToUrl(string $string)
    {
        $separator = '-';
        $wordLimit = 15;
        if($wordLimit != 0){
            $wordArr = explode(' ', $string);
            $string = implode(' ', array_slice($wordArr, 0, $wordLimit));
        }
    
        $quoteSeparator = preg_quote($separator, '#');
    
        $trans = array(
            '&.+?;'                    => '',
            'ñ'                    => 'n',
            'ó'                    => 'o',
            'á'                    => 'a',
            'é'                    => 'e',
            'í'                    => 'i',
            'ú'                    => 'u',
            '[^\w\d _-]'            => '',
            '\s+'                    => $separator,
            '('.$quoteSeparator.')+'=> $separator
        );
    
        $string = strip_tags($string);
        foreach ($trans as $key => $val){
            $string = preg_replace('#'.$key.'#i'.(true ? 'u' : ''), $val, $string);
        }
        $string = preg_replace('/[^A-Za-z0-9-]+/', '', $string);

        $string = strtolower($string);
    
        return trim(trim($string, $separator));
    }
}