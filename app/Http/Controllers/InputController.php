<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputController extends Controller
{
    public function hello(Request $request): string
    {
        $name = $request->input('name');
        return "Hello $name";
    }

    public function helloFirstName(Request $request)
    {
        $firstName = $request->input('name.first');
        return "Hello $firstName";
    }

    public function helloInput(Request $request): string
    {
        $input = $request->input();
        return json_encode($input);
    }

    public function arrayInput(Request $request): string
    {
        $names = $request->input('products.*.name');
        return json_encode($names);
    }

    public function inputType(Request $request): string
    {
        $name =$request->input('name');
        $married = $request->boolean('married');
        $birth_date = date($request->input('birth_date'));
    }

    public function filterOnly(Request $request)
    {
        $user = $request->only(['name.first', 'name.last']);
        return json_encode($user);
    }

    public function filterExcept(Request $request)
    {
        $user = $request->except(['name.first', 'name.last']);
        return json_encode($user);
    }

    public function filterMerge(Request $request)
    {
        // di merge tapi tidak mau ada orang yang sembrangan $request->merge(['admin' => false]);;
        $user = $request->input();
        return json_encode($user);
    }
}
