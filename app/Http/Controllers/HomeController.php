<?php

namespace APP\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller{

    public function index(Request $request)
    {
        $data = [
            'name' => 'gema',
            'channel' => $request->channel
        ];
        return view('adminlte',$data);
    }
}
