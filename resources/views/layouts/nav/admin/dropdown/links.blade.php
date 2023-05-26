<!-- Account Management -->
<div class="block px-4 py-2 text-xs text-gray-400">
    {{ __('Manage Account') }}
</div>

<x-dropdown-link href="{{ route('profile.show') }}">
    {{ __('Profile') }}
</x-dropdown-link>

@if (Laravel\Jetstream\Jetstream::hasApiFeatures())
    <x-dropdown-link href="{{ route('api-tokens.index') }}">
        {{ __('API Tokens') }}
    </x-dropdown-link>
@endif

<div class="border-t border-gray-200"></div>

<!-- Authentication -->
<form method="POST" action="{{ route('logout') }}" x-data>
    @csrf

    <x-dropdown-link href="{{ route('logout') }}"
                     @click.prevent="$root.submit();">
        {{ __('Log Out') }}
    </x-dropdown-link>
</form>
