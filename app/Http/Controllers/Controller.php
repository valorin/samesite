<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function redirect(string $domain, string $path, bool $secure, Test $test): string
    {
        $url = $secure
            ? 'https://'.config('samesite.'.$domain)
            : 'http://'.config('samesite.insecure.'.$domain).':8000';

        return "{$url}/{$path}?id={$test->id}";
    }

    protected function loadTest(Request $request): Test
    {
        return Cache::get($request->query('id'));
    }

    protected function log(Test $test, string $message)
    {
        Log::info("[{$test->id}] {$message}", (array) $test);
    }
}
