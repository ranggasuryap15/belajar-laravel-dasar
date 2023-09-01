<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

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

    public function responseView(Request $request): Response
    {
        return response()->view('hello', ['name' => 'Rangga']);
    }

    public function responseJsonView(Request $request): JsonResponse
    {
        $body = [
            'firstName' => 'Rangga',
            'lastName' => 'Prayoga'
        ];
        return response()
            ->json($body);
    }

    public function responseFile(Request $request): BinaryFileResponse
    {
        return response()
            ->file(storage_path('app/public/picture/rangga.jpg'));
    }

    public function responseDownload(Request $request): BinaryFileResponse
    {
        return response()
            ->download(storage_path('app/public/picture/rangga'), 'rangga.jpg');
    }
}
