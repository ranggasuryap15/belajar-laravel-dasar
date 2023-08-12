<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function redirectTo(): string
    {
        return "redirect to";
    }

    public function redirectFrom(): RedirectResponse
    {
        return redirect('/redirect/to');
    }
}
