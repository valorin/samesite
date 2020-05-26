@extends('layout')

@section('content')

    <h2>Manual SameSite Cookie Test</h2>

    <p>Perform a cross-site request back to <code>{{ $domains['home'] }}</code> to test the SameSite cookie attribute:</p>

    <p><a href='https://{{ $domains['home'] }}/cookies/read?test=GET'>Cross-site GET request</a></p>

    <p><a href='https://{{ $domains['external'] }}/cookies/iframe'>Cross-site iframe</a></p>

    <form method='POST' action='https://{{ $domains['home'] }}/cookies/read?test=POST'>
        <p><button>Cross-site POST request</button></p>
    </form>

    <hr>

    <p><em>
        These links/button initiate a cross-site request back to <code>{{ $domains['home'] }}</code>,
        which will allow you to see which cookies the browser adds to the request.
        Your Browser Developer Tools will allow you to monitor the cookies being sent.
    </em></p>

@endsection
