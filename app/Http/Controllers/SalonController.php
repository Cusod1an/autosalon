<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SalonController extends Controller
{
    public function index(): View
    {
        return view('salon.index');
    }


}
