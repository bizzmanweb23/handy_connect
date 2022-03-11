<?php

namespace App\Http\Controllers;

use App\Models\SiteConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    // change lang
    public function changeLanguage($lang)
    {
        App::setLocale($lang);
        Session::put('locale', $lang);
        return redirect(url()->previous());
    }
}