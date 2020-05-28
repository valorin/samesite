<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SetupController extends Controller
{
    public function confirm()
    {
        return view('confirm');
    }

    public function start()
    {
        $test = Test::start();
        $this->log($test, 'Starting setup');

        return view('redirect', ['url' => $this->redirect('shared', 'setup/shared', true, $test)]);
    }

    public function shared(Request $request)
    {
        $test = Test::load($request);
        $test->shared = true;
        $test->save();

        $this->setCookies('shared', $request->isSecure(), $test);

        return view('redirect', ['url' => $this->redirect('external', 'setup/external', $request->isSecure(), $test)]);
    }

    public function external(Request $request)
    {
        $test = Test::load($request);
        $test->external = true;
        $test->save();

        $this->setCookies('external', $request->isSecure(), $test);

        return view('redirect', ['url' => $request->isSecure()
            ? $this->redirect('shared', 'setup/shared', false, $test)       // setup insecure routes
            : $this->redirect('home', 'test/start/recent', true, $test)]);  // redirect to tests
    }

    protected function setCookies(string $domain, bool $secure, Test $test)
    {
        $prefix = $secure ? 'https_' : 'http_';
        setcookie($prefix.$domain.'_none', $test->id, ['samesite' => 'none', 'path' => '/']);
        setcookie($prefix.$domain.'_none_secure', $test->id, ['secure' => true, 'samesite' => 'none', 'path' => '/']);
        setcookie($prefix.$domain.'_lax', $test->id, ['samesite' => 'lax', 'path' => '/']);
        setcookie($prefix.$domain.'_strict', $test->id, ['samesite' => 'strict', 'path' => '/']);
        setcookie($prefix.$domain.'_default', $test->id, ['path' => '/']);
        setcookie($prefix.$domain.'_invalid', $test->id, ['path' => '/', 'samesite' => 'invalid']);
    }
}
