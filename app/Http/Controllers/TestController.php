<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    public function start(Request $request)
    {
        $type = $request->route('type');
        $test = $this->loadTest($request);
        $this->log($test, "Starting {$type} test");

        if ($this->isPost($request)) {
            return view('redirect', [
                'url' => $this->redirect('shared', "test/shared/{$type}", $test),
                'post' => true,
            ]);
        }

        return view('tests', [
            'shared' => $this->redirect('shared', 'test/shared/'.$type, $test),
            'external' => $this->redirect('external', 'test/external/'.$type, $test),
            'redirect' => $this->redirect('shared', 'test/shared/'.$type, $test),
        ]);
    }

    public function shared(Request $request)
    {
        $type = $request->route('type');
        $test = $this->loadTest($request);
        $test->appendCookies($request);
        $test->save();

        if ($this->isIframe($request)) {
            return view('iframe');
        }

        return view('redirect', [
            'url' => $this->redirect('external', "test/external/{$type}", $test),
            'post' => $this->isPost($request),
        ]);
    }

    public function external(Request $request)
    {
        $type = $request->route('type');
        $test = $this->loadTest($request);
        $test->appendCookies($request);
        $test->save();

        if ($this->isIframe($request)) {
            return view('iframe');
        }

        if ($this->isPost($request)) {
            return $this->isRecent($request)
                ? view('redirect', ['url' => $this->redirect('home', 'test/start/delayed', $test), 'delay' => 120])
                : view('results', ['test' => $test]);
        }

        return view('redirect', [
            'url' => $this->redirect('home', "test/start/{$type}", $test),
            'post' => true,
        ]);
    }

    protected function isIframe(Request $request): bool
    {
        return $request->query('method') === 'iframe';
    }

    protected function isRecent(Request $request): bool
    {
        return $request->route('type') === 'recent';
    }

    protected function isPost(Request $request): bool
    {
        return $request->isMethod('POST');
    }
}
