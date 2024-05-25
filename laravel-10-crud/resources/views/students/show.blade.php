<x-app-layout>
    <div class="h-screen flex justify-center">
        <div class="flex flex-col mt-10">
            <div class="flex flex-row rounded-t justify-center bg-blue-500 text-white">
                <div class="ps-2 py-1">
                    <p class="text-sm">DATOS DEL ALUMNO</p>
                </div>
            </div>
            <div class="flex flex-row rounded-t bg-slate-200">
                <div class="basis-1/2 ps-2 py-2">
                    <p class="text-start">DNI</p>
                </div>
                <div class="basis-1/2 pe-2 py-2">
                    <p class="text-end">{{ $student->dni }}</p>
                </div>
            </div>
            <div class="flex flex-row items-center bg-white">
                <div class="basis-1/2 ps-2 py-2">
                    <p class="text-start">NOMBRE</p>
                </div>
                <div class="basis-1/2 pe-2 py-2">
                    <p class="text-end">{{ $student->firstname }} {{ $student->lastname }}</p>
                </div>
            </div>
            <div class="flex flex-row rounded-b bg-slate-200">
                <div class="basis-1/2 ps-2 py-2">
                    <p class="text-start">NACIMIENTO</p>
                </div>
                <div class="basis-1/2 pe-2 py-2">
                    <p class="text-end">{{ $student->birthdate }}</p>
                </div>
            </div>
            <div class="flex flex-row rounded-b bg-white">
                <div class="basis-1/2 ps-2 py-2">
                    <p class="text-start">AÑO</p>
                </div>
                <div class="basis-1/2 pe-2 py-2">
                    <p class="text-end">
                        @switch($student->year)
                            @case('first')
                                <p class="text-end">Primero</p>
                                @break
                            @case('second')
                                <p class="text-end">Segundo</p>
                                @break
                            @case('third')
                                <p class="text-end">Tercero</p>
                                @break 
                        @endswitch
                    </p>
                </div>
            </div>
            <div class="flex flex-row items-center rounded-b bg-slate-200">
                <div class="basis-1/2 ps-2 py-2">
                    <p class="text-start">CONDICIÓN</p>
                </div>
                <div class="basis-1/2 pe-2 py-2">
                    @if ($condition['result'] == 'error')
                        <p class="text-end">{{ $condition['message'] }}</p>
                    @else
                        <p class="text-end">{{ $condition['message'] }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
