<?php

function weatherIndex($index){
    switch ($index) {
        case '0':
            return 'Cerah';
            break;
        case '1':
            return 'Cerah Berawan';
            break;
        case '2':
            return 'Cerah Berawan';
            break;
        case '3':
            return 'Berawan';
            break;
        case '4':
            return 'Berawan Tebal';
            break;
        case '5':
            return 'Udara Kabur';
            break;
        case '10':
            return 'Asap';
            break;
        case '45':
            return 'Kabut';
            break;
        case '60':
            return 'Hujan Ringan';
            break;
        case '61':
            return 'Hujan Sedang';
            break;
        case '63':
            return 'Hujan Lebat';
            break;
        case '80':
            return 'Hujan Lokal';
            break;
        case '95':
            return 'Hujan Petir';
            break;
        case '97':
            return 'Hujan Petir';
            break;

        default:
            return 'null';
            break;
    }

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

?>
