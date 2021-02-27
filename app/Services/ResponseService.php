<?php


namespace App\Services;


class ResponseService
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

    public function isSavedResponder($data)
    {
        if(!blank($data)){
            return response()->json([
                'status' => 'success',
                'message' => 'Data Saved Successfully!!!',
                'data' => $data
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Data Failed To Save!!!',
            'data' => $data
        ]);
    }
}
