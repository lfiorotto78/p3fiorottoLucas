<x-app-layout>
    <div class="h-screen flex justify-center">
        <div class="size-fit mt-10 rounded bg-white">
            <h5 class="py-1 text-center text-lg border-b-4 border-inherit rounded-t bg-blue-500 text-white">Cumpleaños</h5>
            <div class="divide-y-4 divide-inherit">
                @forelse ($students as $student)
                    <div class="flex flex-row items-center px-2 py-1">
                        <p class="basis-1/2 text-start">{{ $student->firstname }} {{ $student->lastname }}</p>
                        <p class="basis-1/2 text-end">{{ Carbon\Carbon::parse($student->birthdate)->age }} años</p>
                    </div>
                @empty
                    <div class="px-2 py-1">
                        <p class="text-start text-md">Nadie cumple años hoy</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
