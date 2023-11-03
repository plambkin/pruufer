<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;



class RandomNumberService
{

    public function getEnrolls24()
    {
        $cacheKey = 'randomNumber'; // Define a cache key

        // Check if a random number is already stored in the cache
        if (Cache::has($cacheKey)) {
            $randomNumber = Cache::get($cacheKey);
        } else {
            // Generate a new random number between 5 and 14
            $randomNumber = mt_rand(5, 14);

            // Store the new random number in the cache with a 24-hour expiration
            Cache::put($cacheKey, $randomNumber, now()->addDay());
        }

        return $randomNumber;
    }
}
