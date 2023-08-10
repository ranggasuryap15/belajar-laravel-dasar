<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ResponseController extends Controller
{
    public function response(Request $request): Response
    {
        return response("Hello Response");
    }

    public function header(Request $request): Response
    {
        $body = ['firstName' => 'Rangga', 'lastName' => 'Prayoga'];
        return response(json_encode($body))
            ->header('Content-Type', 'application/json')
            ->withHeaders([
                'Author' => 'Generus Koding',
                'App' => 'Belajar Laravel'
            ]);
    }

    public function responseJson(Request $request): Response
    {
        $body = ['firstName' => 'Rangga', 'lastName' => 'Prayoga'];
        return response(json_encode($body))
            ->header('Content-Type', 'application/json')
            ->withHeaders([
                'Author' => 'Generus Koding',
                'App' => 'Belajar Laravel',
            ]);
    }
}
