<div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
    
    <select onchange="window.location.href=this.value">
        @foreach($available_locales as $locale_name => $available_locale)
            @if($available_locale === $current_locale)
                <option value="/language/{{ $available_locale }}" selected>{{ $locale_name }}</option>
                @else
                <option value="/language/{{ $available_locale }}">{{ $locale_name }}</option>
            @endif
        @endforeach
    </select>
</div>