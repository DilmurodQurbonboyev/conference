<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use http\Client\Request;
use Illuminate\Support\Carbon;
// use Illuminate\Support\Facades\Http;
use http\QueryString;


class Navbar extends Component
{
    public function render()
    {
        // $usd = '';
        // $rub = '';
        // $euro = '';

        // $response = Http::get('https://cbu.uz/uz/arkhiv-kursov-valyut/json/');

        // $jsonData = $response->json();

        // foreach ($jsonData as $i) {
        //     if ($i['Ccy'] == 'USD') {
        //         $usd = $i['Rate'];
        //     }
        //     if ($i['Ccy'] == 'RUB') {
        //         $rub = $i['Rate'];
        //     }
        //     if ($i['Ccy'] == 'EUR') {
        //         $euro = $i['Rate'];
        //     }
        // }
        return view('livewire.navbar');
    }
}
