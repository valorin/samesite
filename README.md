# SameSite Cookies Tester

The _SameSite Cookies Tester_ is an experiment by [Stephen Rees-Carter](https://stephenreescarter.net/), originally
built for the [Laracon EU](https://laracon.eu/online) talk ["CSRF is dead (or is it?)"](https://src.id.au/csrf).
The intention is to keep it updated with relevant tests for changing SameSite browser behaviours.

Pull Requests are welcome to improve the tests or add new tests, or submit an issue if you have an idea 
but are unsure of the implementation. I used Laravel because it made the routing trivial, but I will admit it's overkill.

It currently features two browser tests:

## Manual SameSite Cookie Testing

Manually test the behaviour of SameSite cookies in your browser across the different cross-site request types: GET, POST, and embedded content.

## Automatic SameSite Browser Test
Automated test suite that audits the behaviour of your browser with the different SameSite options, across https and http, same-site and cross-site requests. Note, it will take a while as there is a delay of 2 minutes to properly account for SameSite=Lax+POST in Chrome.

