@extends('layout')

@section('content')

    <h2>Available Tests</h2>

    <p>
        <strong><a href='https://{{ config('samesite.home') }}/cookies/set'>Manual SameSite Cookie Test</a></strong>
        <br>
        Manually test the behaviour of SameSite cookies in your browser across the different cross-site
        request types: <code>GET</code>, <code>POST</code>, and embedded content.
    </p>
    <p>
        <strong><a href='https://{{ config('samesite.home') }}/setup/confirm'>Automatic SameSite Browser Test</a></strong>
        <br>
        Automated test suite that audits the behaviour of your browser with the different SameSite options,
        across https and http, same-site and cross-site requests. Note, it will take a while as there is a
        delay of 2 minutes to properly account for <code>SameSite=Lax+POST</code> in Chrome.
    </p>

@endsection
