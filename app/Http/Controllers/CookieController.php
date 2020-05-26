<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller
{
    public function reset(Request $request)
    {
        collect($request->cookie())
            ->keys()
            ->each(function ($cookie) {
                return Cookie::forget($cookie);
            });

        return "Cookies forgotten.";
    }

    public function set(Request $request)
    {
        $domains = config('samesite');

        if ($request->getHost() != $domains['home']) {
            return redirect("https://{$domains['home']}/cookies/set");
        }

        $this->setCookie('StrictCookie', 'Cookie set with SameSite=Strict', 'Strict');
        $this->setCookie('LaxCookie', 'Cookie set with SameSite=Lax', 'Lax');
        $this->setCookie('SecureNoneCookie', 'Cookie set with SameSite=None and Secure', 'None', true);
        $this->setCookie('NoneCookie', 'Cookie set with SameSite=None', 'None');

        return view('cookies.set', ['domains' => $domains]);
    }

    public function external(Request $request)
    {
        $domains = config('samesite');

        if ($request->getHost() != $domains['external']) {
            return redirect("https://{$domains['external']}/cookies/external");
        }

        return view('cookies.external', ['domains' => $domains]);
    }

    public function iframe(Request $request)
    {
        return view('cookies.iframe', ['domains' => config('samesite')]);
    }

    public function read(Request $request)
    {

        return view('cookies.read', [
            'test' => $request->query('test'),
           'external' => config('samesite.external'),
            'strict' => $request->cookie('StrictCookie'),
            'lax' => $request->cookie('LaxCookie'),
            'secureNone' => $request->cookie('SecureNoneCookie'),
            'none' => $request->cookie('NoneCookie'),
        ]);
    }
}
