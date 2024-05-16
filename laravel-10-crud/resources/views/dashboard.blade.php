<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div>
        <div>
            <h5>Cumple años hoy</h5>
        </div>
        <div>
            @forelse ($studentsBirthDays as $student)
                <p>{{ $student->firstname }} {{ $student->lastname }}</p>
            @empty
                <p>Nadie cumple años hoy</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
