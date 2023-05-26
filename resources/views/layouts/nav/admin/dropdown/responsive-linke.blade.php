<!-- Account Management -->
<x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
    {{ __('Profile') }}
</x-responsive-nav-link>

@if (Laravel\Jetstream\Jetstream::hasApiFeatures())
    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
        {{ __('API Tokens') }}
    </x-responsive-nav-link>
@endif

<!-- Authentication -->
<form method="POST" action="{{ route('logout') }}" x-data>
    @csrf

    <x-responsive-nav-link href="{{ route('logout') }}"
                           @click.prevent="$root.submit();">
        {{ __('Log Out') }}
    </x-responsive-nav-link>
</form>
