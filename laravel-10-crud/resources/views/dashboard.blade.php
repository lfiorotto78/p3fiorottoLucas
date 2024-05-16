<x-app-layout>
    <div class="h-screen flex justify-center mt-10">
        <div class="size-fit p-2 bg-slate-500/50">
            <h5 class="text-xl p-2">Cumple años hoy</h5>
            @forelse ($studentsBirthDays as $student)
                <p>{{ $student->firstname }} {{ $student->lastname }}</p>
            @empty
                <p>Nadie cumple años hoy</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
