@extends('layout')

@section('content')

    @if ($test != 'iframe')
        <p>SameSite Cookie Status: <strong><code>{{ $test }}</code></strong></p>
    @endif

    <p>
        "StrictCookie" {{ $strict ? '✔' : '❌' }}<br>
        "LaxCookie" {{ $lax ? '✔' : '❌' }}<br>
        "SecureNoneCookie" {{ $secureNone ? '✔' : '❌' }}<br>
        "NoneCookie" {{ $none ? '✔' : '❌' }}<br>
        "DefaultCookie" {{ $default ? '✔' : '❌' }}
    </p>

    @if ($test != 'iframe')
        <p>Run another test from the <a href='https://{{ $external }}/cookies/external'>External Site</a>.</p>

        <hr>

        <p><em>
                Since you arrived here as part of a cross-site request from <code>{{ $external }}</code>,
                your browser will have checked the SameSite cookie attribute and only sent cookies that were allowed for
                this specific request. All other cookies will have been blocked.
        </em></p>

        @include('cookies.rules')
    @endif

@endsection
