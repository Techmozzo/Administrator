<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;


class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('success', function($status, $message,  $data = null){
            $result = ['success' => true, 'message' => $message];
            if($data !== null) $result['data'] = $data;
            return response()->json($result, $status);
        });

        Response::macro('error', function($status, $message, $errors = null){
            $result = ['success' => false, 'message' => $message];
            if($errors !== null) $result['errors'] = $errors;
            return response()->json($result, $status);
        });
    }
}
