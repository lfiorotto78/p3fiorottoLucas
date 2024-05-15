<x-app-layout>
    <div class="h-screen flex justify-center pt-10">
        <div class="size-fit">
            <form action="{{ route('students.search') }}" method="post" autocomplete="off">
                @csrf
                
                <label for="dni" class="text-sm text-slate-500">DNI</label> <br>
                <input type="text" name="dni" id="dni" value="{{ old('dni') }}" class="peer max-h-9 bg-transparent/5 border-0 border-b-2 border-blue-500 rounded-t hover:border-b-4 hover:shadow-md focus:outline-none focus:ring-0 focus:border-b-4 focus:border-blue-500 focus:shadow-md">
                @error('dni') <p>{{ $message }}</p> @enderror
                <div class="flex justify-center py-4">
                    <button type="submit" class="px-3 py-1 rounded active:scale-90 bg-blue-500 text-white">Buscar</button>
                </div>
            </form> <br>

            @if (Session::has('unexistent'))
                {{ Session::get('unexistent') }}
            @endif

            @if (Session::has('success'))
                {{ Session::get('success') }}
            @endif

            @isset($student)
                <div>
                    <p>{{ $student->dni }}</p>
                    <p>{{ $student->firstname }} {{ $student->lastname }}</p>
                    <p>{{ $student->birthdate }}</p> <br>

                    @forelse ($assists as $assist)
                        @if ($todayDate == $assist->created_at->format('Y-m-d'))
                            <p>Asistencia ya registrada</p>
                            @break
                        @endif
                    @empty
                        <form action="{{ route('assists.store') }}" method="post">
                            @csrf

                            <input type="hidden" name="id" value="{{ $student->id }}">
                            <button type="submit">Dar asistencia</button>
                        </form>
                    @endforelse
                </div>
            @endisset
        </div>
    </div>
</x-app-layout>