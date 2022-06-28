<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Transactaion;

class TransactaionController extends BaseController
{
    public function index(Request $request, Transactaion $transactaion){
        return response()->json($transactaion->list());
    }
}
