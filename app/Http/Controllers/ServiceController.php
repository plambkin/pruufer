<?php

namespace App\Http\Controllers;

use App\Services\RandomNumberService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ServiceController extends Controller
{
    protected $randomNumberService;

    public function __construct(RandomNumberService $randomNumberService)
    {
        $this->randomNumberService = $randomNumberService;
    }

    public function getEnrolls24()
    {
        Log::debug('Entered getEnrolls24() from within the ServiceController');

        $randomNumber = $this->randomNumberService->getEnrolls24();

        return response()->json(['randomNumber' => $randomNumber]);
    }
}
