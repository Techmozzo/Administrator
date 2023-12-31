<?php

use Carbon\Carbon;
use Hashids\Hashids;
use Illuminate\Support\Str;

if (!function_exists('greet')) {
    function greet()
    {
        $hrs = Carbon::now()->format('H');
        $msg = "";
        if ($hrs >  0) $msg = "Mornin' Sunshine!"; // REALLY early
        if ($hrs >  6) $msg = "Good morning";      // After 6am
        if ($hrs > 12) $msg = "Good afternoon";    // After 12pm
        if ($hrs > 17) $msg = "Good evening";      // After 5pm
        if ($hrs > 22) $msg = "Go to bed!";        // After 10pm
        return $msg;
    }
}

if (!function_exists('generateSlug')) {

    function generateSlug($model, $name)
    {
        if ($model::whereSlug($slug = Str::slug($name))->exists()) {
            $max = $model::whereName($name)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function ($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }
}

if (!function_exists('searchByDate')) {

    function searchByDate($query, $request, $created_at = 'created_at')
    {
        if (!empty($request->start_date) && !empty($request->end_date)) {
            if ($request->start_date == $request->end_date) {
                $query->whereDate($created_at, $request->start_date);
            } else {
                $query->whereBetween($created_at, [$request->start_date, $request->end_date]);
            }
        } else {
            $query->whereMonth($created_at, date('m'));
        }
        return $query;
    }
}


if (!function_exists('storeFileLocally')) {

    function storeFileLocally(string $folderName, Object $file): String
    {
        $name = time() . '.' . $file->extension();
        $file->move(public_path('store/' . $folderName), $name);
        return 'store/' . $folderName . '/' . $name;
    }
}

if (!function_exists('decrypt_helper')) {
    function decrypt_helper($id)
    {
        return (new Hashids(config('app.hash_key'), 32))->decode($id)[0] ?? null;
    }
}

if (!function_exists('encrypt_helper')) {
    function encrypt_helper($id)
    {
        if (is_numeric($id)) {
            return (new Hashids(config('app.hash_key'), 32))->encode($id);
        }
    }
}
