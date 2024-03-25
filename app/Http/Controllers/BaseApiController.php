<?php

namespace App\Http\Controllers;

class BaseApiController extends Controller {
    public function error($data, $message = null, $code) {
        return response()->json([
            'status' => $code,
           'message' => $message ?? 'error occured',
            'data' => $data
        ]);
    }
    public function success($data, $message = null, $code) {
        return response()->json([
           'status' => $code,
           'message' => $message ??'success',
            'data' => $data
        ]);
    }
}
