<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected function jsonErrorResponse( $data, $message = 'Error',  $statusCode = 200)
    {
        return response()->json(['status'=>0, 'data'=>$data, 'message'=>$message], $statusCode);
    }
}
