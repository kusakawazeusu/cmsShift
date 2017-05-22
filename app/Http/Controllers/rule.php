<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class rule extends Controller
{
    public function get_long( $string )
    {
        $count = 10*(int)chr('0x'.$string[2].$string[3]) + (int)chr('0x'.$string[0].$string[1]);
        return $count;
    }

    public function get_word( $count, $string )
    {
        $point = 0;

        for($i=0;$i<2*$count;$i+=2)
        {
            $word[$point] = chr( '0x'.$string[$i].$string[$i+1] );
            $point++;
        }
        return $word;
    }

    public function read( $string )
    {
        $tablename_count = self::get_long( substr($string,0,4) );
        
        $tablename = self::get_word($tablename_count, substr( $string,4,2*$tablename_count ) );
        
        

        $rule = implode($tablename);

        return view('rule_read',['pre_rule'=>$string,'rule'=>$rule]);
    }
}
