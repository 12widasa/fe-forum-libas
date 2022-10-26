<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }
    public function detailed($id)
    {
        $feedId = $id;
        return view('frontend.detailed', compact('feedId'));
    }
    public function show ($id) {
        return $id;
    }
}
