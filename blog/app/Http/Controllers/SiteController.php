<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller {

    public function index() {
        $fullname = "Krit Pattanapanich";
        return view('about', [
            'fullname' => $fullname
        ]);
    }

}
