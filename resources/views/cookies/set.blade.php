@extends('layout')

@section('content')

    <p>The following cookies have been set:</p>

    <p>
        "StrictCookie" with <code>SameSite=Strict</code><br>
        "LaxCookie" with <code>SameSite=Lax</code><br>
        "SecureNoneCookie" with <code>Secure</code> and <code>SameSite=None</code><br>
        "NoneCookie" with <code>SameSite=None</code><br>
        "DefaultCookie" with no <code>SameSite</code> attribute
    </p>

    <p>The next step is to <a href='https://{{ $domains['external'] }}/cookies/external'>go to External Site</a>.</p>

    <hr>

    <p><em>
        Now that the cookies have been set on <code>{{ $domains['home'] }}</code>, you need to go to the external
        site at <code>{{ $domains['external'] }}</code> and make requests back to this domain.
        The browser will attach the allowed cookies, as specified by the SameSite cookie attribute.
    </em></p>
    <p><em>
        You can monitor the behaviour of the cookies in the Browser Developer Tools, to see which cookies were attached to which requests.
    </em></p>

@endsection
