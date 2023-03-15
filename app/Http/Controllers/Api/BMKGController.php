<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class BMKGController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {

        $xmlString = file_get_contents('https://data.bmkg.go.id/DataMKG/MEWS/DigitalForecast/DigitalForecast-JawaTimur.xml');
        $xmlObject = new \SimpleXMLElement($xmlString);

        $json = json_encode($xmlObject);
        $phpArray = collect((object)json_decode($json, true));
        return $phpArray['forecast']['area'][11]['parameter'][6]['timerange']; //'hourly'
        //'0 : Cerah / Clear Skies <br>
        // 1 : Cerah Berawan / Partly Cloudy <br>
        // 2 : Cerah Berawan / Partly Cloudy <br>
        // 3 : Berawan / Mostly Cloudy <br>
        // 4 : Berawan Tebal / Overcast <br>
        // 5 : Udara Kabur / Haze <br>
        // 10 : Asap / Smoke <br>
        // 45 : Kabut / Fog <br>
        // 60 : Hujan Ringan / Light Rain <br>
        // 61 : Hujan Sedang / Rain <br>
        // 63 : Hujan Lebat / Heavy Rain <br>
        // 80 : Hujan Lokal / Isolated Shower <br>
        // 95 : Hujan Petir / Severe Thunderstorm <br>
        // 97 : Hujan Petir / Severe Thunderstorm <br>';
    }
}
