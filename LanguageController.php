<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index()
    {
        return view('language'); 
    }

    public function store(Request $request)
    {
        
        return redirect()->route('language.index')->with('message', 'تم حفظ اللغة بنجاح!');
    }
}
