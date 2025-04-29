<?php

namespace App\Traits;


// This Trait is used with the controllers to share some functionality along with all the controllers.
trait ApiResponses {

    protected function ok($message, $data = []) {
        return $this->success($message, $data, 200);
    }

    protected function notAuthorized($message) {
        return $this->error([
            'status' => 401,
            'message' => $message,
        ]);
    }

    protected function success($message, $data = [], $statusCode = 200) {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'status' => $statusCode
        ], $statusCode);
    }

    protected function error($errors = [], $statusCode = null) {
        if(is_string($errors))
        {
            return response()->json([
                'message' => $errors,
                'status' => $statusCode
            ], $statusCode);
        }
        return response()->json([
            'errors' => $errors
        ]);
    }
}
