<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron bg-light">
    <div class="container">
        <a href="/" title="{{ __('misc.home_alt') }}" alt="{{ __('misc.home_alt') }}" class="text-decoration-none">
            <h1 class="display-4 font-weight-bold">{{ __('misc.homepage_title') }}</h1>
        </a>
        <div class="introduction-text font-weight-bold">
            {{ $introduction_text ?? '' }}
        </div>
    </div>
</div>