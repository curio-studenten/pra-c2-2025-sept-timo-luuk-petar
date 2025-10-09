<nav class="navbar navbar-expand navbar-dark bg-dark">
    <div class="container">
        <div class="navbar-header mr-auto">
            <a class="navbar-brand" href="/" title="{{ __('misc.home_alt') }}">{{ __('misc.homepage_title') }}</a>
        </div>
        <div id="navbar" class="form-inline">
            <!-- Language Switcher -->
            <div class="language-switcher mr-3">
                <a href="/language/nl/" class="text-white mr-2 {{ app()->getLocale() == 'nl' ? 'font-weight-bold' : '' }}" title="Nederlands">NL</a>
                <span class="text-white">|</span>
                <a href="/language/en/" class="text-white ml-2 {{ app()->getLocale() == 'en' ? 'font-weight-bold' : '' }}" title="English">EN</a>
            </div>

            <script>
                (function () {
                    var cx = 'partner-pub-6236044096491918:8149652050';
                    var gcse = document.createElement('script');
                    gcse.type = 'text/javascript';
                    gcse.async = true;
                    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(gcse, s);
                })();
            </script>
            <gcse:searchbox-only></gcse:searchbox-only>
        </div><!--/.navbar-collapse -->
    </div>
</nav>