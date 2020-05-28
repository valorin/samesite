@extends('layout')

@section('content')

    <h2>Automatic SameSite Browser Test</h2>

    <p><strong>Before you start the testsuite, there is something you need to know!</strong></p>
    <p>
        This test will take <strong>more than two minutes</strong>, as this test needs to first create cookies in your
        browser and then wait for them to be older than 2 minutes. This is required so we can observe the behaviour
        of <code>SameSite=Lax+POST</code> over time on cookies without a <code>SameSite</code> attribute set.
    </p>

    <p>
        <em>The results of each test is stored for only 24 hours. The only information stored is a list of the cookies
            observed in each request. No personal data is collected or logged.
            If you want to keep test results for longer than 24 hours, I recommend you screenshot the page.</em>
    </p>

    <form method="POST" action="/setup/start">
        <p><button type="submit">Start the test!</button></p>
    </form>

@endsection
