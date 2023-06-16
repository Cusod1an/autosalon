<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CountryController extends Controller
{
    public function index(): View
    {
        $countries = Country::all();
        return view('country.index', compact('countries'));
    }


}
