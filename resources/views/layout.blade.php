<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SameSite Cookies Tester</title>
</head>
<body>

    @if (($test ?? '') != 'iframe')
        <h1>SameSite Cookies Tester</h1>
    @endif

    @yield('content')

    @if (($test ?? '') != 'iframe')
        <hr>

        <p><a href="https://{{ config('samesite.home') }}">Available Tests</a></p>
        <p>
            <em>An experiment by <a href="https://stephenreescarter.net/">Stephen Rees-Carter</a> for <a href="https://src.id.au/csrf">"CSRF is dead (or is it?)"</a> and <a href="https://src.id.au/samesite">"SameSite Cookies Deep Dive"</a>.<br>
            <a href="https://github.com/valorin/samesite" target="_blank" rel="noreferrer noopener">Source Code on GitHub</a>, PRs welcome.</em>
        </p>
    @endif

</body>
</html>
