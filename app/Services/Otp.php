<?php

namespace App\Services;

use App\Jobs\SendOtpViaEmailJob;
use App\Models\Otp as OtpModel;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;


class Otp
{
    private static function generateOTP()
    {
        $otp = random_int(100000, 999999);
        $otp_exist = OtpModel::where([['code', $otp], ['expired_at', '>=', Carbon::now()->subMinutes(10)]])->first();
        if (!$otp_exist) {
            return $otp;
        } else {
            self::generateOTP();
        }
    }

    private static function getOtp($user_id)
    {
        $otp = self::generateOTP();
        OtpModel::updateOrCreate(['user_id' => $user_id], ['code' => $otp, 'expired_at' => now()]);
        return $otp;
    }

    public static function sendOtp($user){
        try{
            $otp = self::getOtp($user->id);
            SendOtpViaEmailJob::dispatch($user, $otp);
        }catch(Exception $e){
            Log::info(json_encode($e));
            throw new HttpResponseException(response()->error(Response::HTTP_INTERNAL_SERVER_ERROR, $e->getMessage()));
        }
    }
}
