<x-app-layout>
    @auth
    <div class="grid grid-cols-autoLayout my-8 gap-4 w-full  dark:bg-gray-900">
        @foreach ($inverters as $inverter)
        <div class=" text-gray-200 block max-w-sm text-center mx-auto w-full rounded-md border-[1px] px-3 py-4 border-gray-300 bg-slate-800">
            <p>Model: {{ $inverter->Model }}</p>
            <p>Cost: ${{ $inverter->Cost }}</p>
            <form method="GET" action="{{ route('inverter.show', $inverter) }}">
                @csrf
                <x-primary-button class="mt-4">{{ __('View') }}
                </x-primary-button>
            </form>
            <form method="GET" action="{{ route('inverter.edit', $inverter) }}">
                @csrf
                <x-primary-button class="mt-4">{{ __('Edit') }}
                </x-primary-button>
            </form>
        </div>
        @endforeach
        @foreach ($batteries as $battery)
        <div class=" text-gray-200 block max-w-sm text-center mx-auto w-full rounded-md border-[1px] px-3 py-4 border-gray-300 bg-slate-800">
            <p>Model: {{ $battery->Model }}</p>
            <p>Cost: ${{ $battery->Cost }}</p>
            <form method="GET" action="{{ route('battery.show', $battery) }}">
                @csrf
                <x-primary-button class="mt-4">{{ __('View') }}
                </x-primary-button>
            </form>
            <form method="GET" action="{{ route('battery.edit', $battery) }}">
                @csrf
                <x-primary-button class="mt-4">{{ __('Edit') }}
                </x-primary-button>
            </form>
        </div>
        @endforeach
        @foreach ($solar_panels as $solar_panel)
        <div class=" text-gray-200 block max-w-sm text-center mx-auto w-full rounded-md border-[1px] px-3 py-4 border-gray-300 bg-slate-800">
            <p>Model: {{ $solar_panel->Model }}</p>
            <p>Cost: ${{ $solar_panel->Cost }}</p>
            <form method="GET" action="{{ route('panel.show', $solar_panel) }}">
                @csrf
                <x-primary-button class="mt-4">{{ __('View') }}
                </x-primary-button>
            </form>
            <form method="GET" action="{{ route('panel.edit', $solar_panel) }}">
                @csrf
                <x-primary-button class="mt-4">{{ __('Edit') }}
                </x-primary-button>
            </form>
        </div>
        @endforeach
    </div>
    @endauth
</x-app-layout>