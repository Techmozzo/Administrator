<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationRequest;
use Illuminate\Http\Request;

class ValidationController extends Controller
{
    public function index(){
        return view('validation.index');
    }

    public function upload(ValidationRequest $request){
        $frontViewName = time() . '_fv.' . $request->front_view->extension();
        $request->front_view->move(public_path('store'), $frontViewName);
        $backViewName = time() . '_bv.' . $request->back_view->extension();
        $request->back_view->move(public_path('store'), $backViewName);
        auth()->user()->update(['identification' => [$frontViewName, $backViewName], 'verified' => 0]);
        return redirect()->route('home')->with('success', 'Upload successful, Verification will be done within 24hrs');
    }
}
