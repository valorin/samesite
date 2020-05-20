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

    public function set()
    {
        $this->setCookie('StrictCookie', 'Cookie set with SameSite=Strict', 'Strict');
        $this->setCookie('LaxCookie', 'Cookie set with SameSite=Lax', 'Lax');
        $this->setCookie('SecureNoneCookie', 'Cookie set with SameSite=None and Secure', 'None', true);
        $this->setCookie('NoneCookie', 'Cookie set with SameSite=None', 'None');

        $external = config('samesite.external');

        return implode('<br>', [
            'The following cookies have been set:',
            '',
            '"StrictCookie" with <code>SameSite=Strict</code>',
            '"LaxCookie" with <code>SameSite=Lax</code>',
            '"SecureNoneCookie" with <code>Secure</code> and <code>SameSite=None</code>',
            '"NoneCookie" with <code>SameSite=None</code>',
            '',
            "<a href='https://{$external}/cookies/external'>External Site</a>",
        ]);
    }

    public function external(Request $request)
    {
        $domains = config('samesite');
        $read = "https://{$domains['home']}/cookies/read";

        return implode('<br>', [
            "<a href='{$read}'>Cross-site GET request</a>",
            "<a href='https://{$domains['external']}/cookies/iframe'>Cross-site iframe</a>",
            "<form method='POST' action='{$read}'><button>Cross-site POST request</button></form>",
        ]);
    }

    public function iframe(Request $request)
    {
        $domains = config('samesite');
        $get = "https://{$domains['home']}/cookies/read";

        return implode('<br>', [
            "<iframe width=200 height=200 src='{$get}'></iframe>",
            '',
            "<a href='https://{$domains['external']}/cookies/external'>External Site</a>",
        ]);
    }

    public function read(Request $request)
    {
        $external = config('samesite.external');

        return implode('<br>', [
            'Checking cookie status:',
            '',
            '"StrictCookie" '.($request->cookie('StrictCookie') ? '✔' : '❌'),
            '"LaxCookie" '.($request->cookie('LaxCookie') ? '✔' : '❌'),
            '"SecureNoneCookie" '.($request->cookie('SecureNoneCookie') ? '✔' : '❌'),
            //'"NoneCookie" '.($request->cookie('NoneCookie') ? '✔' : '❌'),
            '',
            "<a href='https://{$external}/cookies/external'>External Site</a>",
        ]);
    }
}
