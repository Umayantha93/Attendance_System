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


    public function combineArray() {
        $data_array = array(
            array(
                "company" => "Company A",
                "file" => "document.docx"
            ),
            array(
                "company" => "Company A",
                "file" => "letter.txt"
            ),
            array(
                "company" => "Company B",
                "file" => "insurance.docx"
            )
        );
        
        $grouped_array = array();
        foreach ($data_array as $element) {
            $grouped_array[$element['company']][] = $element;
        }
        
        echo "Array grouped according to Company: <br>";
        print_r($grouped_array);
    }


    public function getCombineArray() 
    {
        $collection = collect([
            ["company" => "Company A", "file" => "document.docx"],
            ["company" => "Company A", "file" => "letter.txt"],
            ["company" => "Company B", "file" => "insurance.docx"],
        ])->groupBy('company');


       return $collection;
    }
}


