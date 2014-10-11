 <ul class="language-chooser nav navbar-nav pull-right">
    @foreach(Localization::getSupportedLocales() as $localeCode => $properties)
    <li>
        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{Localization::getLocalizedURL($localeCode) }}">
            <img src="{{ asset('assets/img/flags/' . $localeCode . '.png') }}" alt="{{ $properties['native'] }}"/>
        </a>
    </li>
    @endforeach
</ul>