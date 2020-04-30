<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SetupController extends Controller
{
    public function start()
    {
        $test = Test::start();
        $this->log($test, 'Starting setup');

        return view('redirect', ['url' => $this->redirect('shared', 'setup/shared', $test)]);
    }

    public function shared(Request $request)
    {
        $test = $this->loadTest($request);
        $test->shared = true;
        $test->save();

        setcookie('shared_none', 'shared-site-with-same-site-none-without-secure_'.$test->id, ['samesite' => 'none', 'path' => '/']);
        setcookie('shared_none_secure', 'shared-site-with-same-site-none-with-secure_'.$test->id, ['secure' => true, 'samesite' => 'none', 'path' => '/']);
        setcookie('shared_lax', 'shared-site-with-same-site-lax_'.$test->id, ['samesite' => 'lax', 'path' => '/']);
        setcookie('shared_strict', 'shared-site-with-same-site-strict_'.$test->id, ['samesite' => 'strict', 'path' => '/']);
        setcookie('shared_default', 'shared-site-with-only-defaults_'.$test->id, ['path' => '/']);
        setcookie('shared_invalid', 'shared-site-with-invalid-value_'.$test->id, ['path' => '/', 'samesite' => 'invalid']);

        return view('redirect', ['url' => $this->redirect('external', 'setup/external', $test)]);
    }

    public function external(Request $request)
    {
        $test = $this->loadTest($request);
        $test->external = true;
        $test->save();

        setcookie('external_none', 'external-site-with-same-site-none-without-secure_'.$test->id, ['samesite' => 'none', 'path' => '/']);
        setcookie('external_none_secure', 'external-site-with-same-site-none-with-secure_'.$test->id, ['secure' => true, 'samesite' => 'none', 'path' => '/']);
        setcookie('external_lax', 'external-site-with-same-site-lax_'.$test->id, ['samesite' => 'lax', 'path' => '/']);
        setcookie('external_strict', 'external-site-with-same-site-strict_'.$test->id, ['samesite' => 'strict', 'path' => '/']);
        setcookie('external_default', 'external-site-with-only-defaults_'.$test->id, ['path' => '/']);
        setcookie('external_invalid', 'external-site-with-invalid-value_'.$test->id, ['path' => '/', 'samesite' => 'invalid']);

        return view('redirect', ['url' => $this->redirect('home', 'test/start/recent', $test)]);
    }
}
