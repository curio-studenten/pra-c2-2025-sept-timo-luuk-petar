<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <x-head/>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .content-wrapper {
            flex: 1;
        }
        .footer {
            margin-top: auto;
        }
        .language-switcher a {
            text-decoration: none;
            transition: color 0.3s;
        }
        .language-switcher a:hover {
            color: #ccc !important;
        }
    </style>
</head>
<body>

<x-navbar/>

<div class="content-wrapper">
    <div class="container">
        <x-header/>
        <ul class="breadcrumb">
            <li><a href="/" title="{{ __('misc.home_alt') }}"
                alt="{{ __('misc.home_alt') }}">{{ __('misc.home') }}</a></li>
            {{ $breadcrumb ?? '' }}
        </ul>

        @if ( isset($_GET['q']) )
            <x-search_results/>
        @else
            {{ $slot }}
        @endif

        <ul class="breadcrumb">
            <li>
                <a href="/" title="{{ __('misc.home_alt') }}" alt="{{ __('misc.home_alt') }}">{{ __('misc.home') }}</a>
            </li>
            {{ $breadcrumb ?? '' }}
        </ul>
    </div>
</div>

<x-footer/>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>//window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="{{ asset('/js/app.js') }}"></script>

</body>
</html>