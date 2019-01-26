<?php

namespace Waygou\Laraning\Features\Home\Controllers;

use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index()
    {
        return ['text' => 'Hi there! This is a Twinkle!'];
    }
}
