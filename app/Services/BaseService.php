<?php


namespace App\Services;


class BaseService
{
    public function responder($data)
    {
        if(!blank($data)){
            return response()->json([
                'status' => 'success',
                'message' => 'Data Found!!!',
                'data' => $data
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Data Not Found!!!',
            'data' => $data
        ]);
    }
}
