<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        @yield('title')
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="{{asset('js/svg-inject.min.js')}}"></script>
        <script src="https://kit.fontawesome.com/de6c47bae5.js" crossorigin="anonymous"></script>
        @yield('extra-metas')

        <!-- Cookie Consent by https://www.FreePrivacyPolicy.com -->
        <script type="text/javascript" src="//www.freeprivacypolicy.com/public/cookie-consent/3.1.0/cookie-consent.js"></script>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function () {
                cookieconsent.run({
                    "notice_banner_type":"simple",
                    "consent_type":"express",
                    "palette":"light",
                    "language":"es",
                    "website_name":"Encis-dietetica",
                    "cookies_policy_url": "https://www.encis-dietetica.com/politica-de-privacidad"
                });
            });
        </script>
        <script type="text/plain" cookie-consent="tracking">
            $(document).ready(function(){
            gtag('consent', 'update', {
                'analytics_storage': 'granted'
            });
            console.log('tracking fired');
            });
        </script>

        <script type="text/plain" cookie-consent="targeting">
            $(document).ready(function(){
            gtag('consent', 'update', {
                'ad_storage': 'granted'
            });
            console.log('targeting fired');
            });
        </script>
        <!-- End Cookie Consent -->
    </head>
    <body>
        <script src="https://www.google.com/recaptcha/api.js?render={{ config('recaptcha.sitekey') }}"></script>
        @include('layouts.complements.header')
        @yield('content')
        @include('layouts.complements.footer')

        <script src="{{ asset('js/app.js') }}"></script>
        @yield('scripts')
    </body>
</html>
