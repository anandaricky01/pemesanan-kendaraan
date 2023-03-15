<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index(){
        try {
            $xmlString = file_get_contents('https://data.bmkg.go.id/DataMKG/MEWS/DigitalForecast/DigitalForecast-JawaTimur.xml');
            $xmlObject = new \SimpleXMLElement($xmlString);

            $json = json_encode($xmlObject);
            $phpArray = collect((object)json_decode($json, true));
            return view('home', [
                'cuaca' => $phpArray['forecast']['area'][11]['parameter'][6]['timerange']
            ]);
        } catch (\Throwable $th) {
            throw new \Exception('Error: ' . $th->getMessage());
        }

    }
}
