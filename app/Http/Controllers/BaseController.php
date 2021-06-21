<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**
     * Send error response
     *
     * @param $code
     * @param null $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendError($code, $message = null){
        switch ($code){
            case 400:
                if(!$message)
                    $message = "Bad Request";

                break;
            case 403:
                if(!$message)
                    $message = "This action is unauthorized.";

                break;
            case 404:
                if(!$message)
                    $message = "Resource Not Found";

                break;
            case 405:
                if(!$message)
                    $message = __('messages.action_not_allowed');
                break;
            case 422:
                if(!$message)
                    $message = __('messages.validation_error');
                break;
            default:
                if(!$message)
                    $message = "Server Error";

                break;
        }

        $response = [
            'success' => false,
            'message' => $message,
        ];

        return response()->json($response, $code);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result = null, $message = "")
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }

}
