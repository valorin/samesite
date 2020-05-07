<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected function redirect(string $domain, string $path, bool $secure, Test $test): string
    {
        $url = $secure
            ? 'https://'.config('samesite.'.$domain)
            : 'http://'.config('samesite.insecure.'.$domain).':8080';

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
