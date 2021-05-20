<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function sendResponse($result){
        $response=[
            "success" => true,
            "data"=> $result
        ];
        return response()->json($response,200);

    }
    public function sendError($error){
        $response=[
            "success" => false,
            "error"=> $error
        ];
        return response()->json($response,501);

    }
}
