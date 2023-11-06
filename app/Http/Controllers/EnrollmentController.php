<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class EnrollmentController extends Controller
{

    public function getEnrolls24($token)
    {
        // Define a unique cache key for each token
        $cacheKey = 'enrolls_' . $token;

        // Get the random number from the cache for the specified token
        $enrolls = Cache::get($cacheKey);

        if ($enrolls === null) {
            // Generate a new random number between 5 and 14
            $enrolls = mt_rand(5, 14);

            // Store the new random number in the cache with a 24-hour expiration
            Cache::put($cacheKey, $enrolls, 24 * 60); // 24 hours

            return response()->json(['enrolls' => $enrolls]);
        }

        return response()->json(['enrolls' => $enrolls]);
    }
}
