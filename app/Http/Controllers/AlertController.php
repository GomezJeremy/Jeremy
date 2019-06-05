<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Alert;
class AlertController extends Controller
{
    //
  
    public function index()
    {
        $items = [
            'dashboard'          => [],
            'about'         => [],
            'contact-us'    => [],
            'login'         => [],
            'register'      => []
        ];
        return view('test', compact('items'));
    }


public function show() 
{
    \Alert::message('this is a test message', 'info');
    \Alert::message('this is a test message', 'info');
    \Alert::message('this is a test message', 'warning');
    \Alert::message('this is a test message', 'danger');
    \Alert::message('this is a test message', 'success');
    return view('test');
}


}
