<x-app-layout>
    <div class="h-screen flex justify-center">
        <div class="mt-10 size-fit">
            <form action="{{ route('students.search') }}" method="post" autocomplete="off">
                @csrf
                
                <div class="flex justify-start">
                    <label for="dni" class="text-slate-500">DNI</label>
                </div>
                <div class="w-full flex justify-center">
                    <input type="text" name="dni" id="dni" value="{{ old('dni') }}"
                    class="h-10 w-full rounded-t border-0 border-b-2 border-blue-500 hover:border-b-4 focus:border-b-4 focus:outline-none focus:ring-0 focus:border-blue-500 bg-transparent/5">
                </div>

                <p class="h-8">@error('dni') {{ $message }} @enderror</p>

                <div class="flex justify-center">
                    <input type="submit" value="Buscar" class="px-2 py-1 rounded text-lg bg-blue-500 text-white">
                </div>
            </form>

            <div class="mt-5">
                @if (Session::has('unexistent'))
                    <p class="text-lg underline decoration-2 decoration-red-500">{{ Session::get('unexistent') }}</p>
                @endif

                @if (Session::has('success'))
                    <p class="text-lg underline decoration-2 decoration-green-600">{{ Session::get('success') }}</p>
                @endif
            </div>
            
            @isset($student)
                <div class="flex flex-col">
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
                            <p class="text-start">Nombre</p>
                        </div>
                        <div class="basis-1/2 pe-2 py-2">
                            <p class="text-end">{{ $student->firstname }} {{ $student->lastname }}</p>
                        </div>
                    </div>
                    <div class="flex flex-row rounded-b bg-slate-200">
                        <div class="basis-1/2 ps-2 py-2">
                            <p class="text-start">Nacimiento</p>
                        </div>
                        <div class="basis-1/2 pe-2 py-2">
                            <p class="text-end">{{ $student->birthdate }}</p>
                        </div>
                    </div>
                </div>

                @if (empty($lastAssist) || $lastAssist->created_at->toDateString() != Carbon\Carbon::now()->toDateString())
                    <form action="{{ route('assists.store') }}" method="post">
                        @csrf

                        <input type="hidden" name="id" value="{{ $student->id }}">
                        <div class="flex justify-center mt-4">
                            <button type="submit" class="px-2 py-1 rounded text-lg bg-green-600 text-white">Registrar asistencia</button>
                        </div>
                    </form>    
                @else
                    <div class="flex justify-center mt-5">
                        <p class="text-lg underline decoration-2 decoration-yellow-400">Asistencia ya registrada</p>
                    </div>
                @endif
            @endisset
        </div>
    </div>
</x-app-layout>