<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArrayController extends Controller
{
    //

    public function arrayNumbers(){
        $numbers = array(1, 1, 3, 3, 6, 1, 8, 9, 4, 6, 3);

        $unique = array_unique($numbers);
        
        $duplicates = array_diff_assoc($numbers, $unique);
        
        print_r($duplicates);
    }
}
