<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    private function fetchData()
    {
        $apiUrl = env('EXTERNAL_API_URL');
        $response = Http::get($apiUrl)->json();

        if (!isset($response['DATA'])) {
            return [];
        }

        $lines = explode("\n", trim($response['DATA']));
        $header = explode('|', array_shift($lines));

        $data = [];
        foreach ($lines as $line) {
            $row = explode('|', $line);
            $data[] = array_combine($header, $row);
        }

        return $data;
    }

    public function byName($name)
    {
        $data = collect($this->fetchData());
        return $data->where('NAMA', $name)->values();
    }

    public function byNim($nim)
    {
        $data = collect($this->fetchData());
        return $data->where('NIM', $nim)->values();
    }

    public function byYmd($ymd)
    {
        $data = collect($this->fetchData());
        return $data->where('YMD', $ymd)->values();
    }
}
