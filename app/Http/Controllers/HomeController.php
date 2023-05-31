<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function monitoring(){
        try {
            $response = Http::timeout(5)->get('https://data.bmkg.go.id/DataMKG/MEWS/DigitalForecast/DigitalForecast-JawaTimur.xml');

            if (!$response->ok()) {
                throw new \Exception('Request failed: ' . $response->status());
            }

            $xmlString = $response->body();
            $xmlObject = new \SimpleXMLElement($xmlString);

            $json = json_encode($xmlObject);
            $phpArray = collect((object)json_decode($json, true));

            return view('monitoring', [
                'cuaca' => $phpArray['forecast']['area'][11]['parameter'][6]['timerange'],
            ]);
        } catch (\Throwable $th) {
            return view('monitoring', [
                'cuaca' => 'kosong',
            ]);
        }

    }

    public function about(){
        $contacts = Contact::latest()->get();
        return view('about', [
            'contacts' => $contacts
        ]);
    }
}
