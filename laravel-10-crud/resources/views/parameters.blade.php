<x-app-layout>
    <div>
        @if (isset($parameters))
            <form action="{{ route('parameters.store') }}" method="post">
                @csrf
            </form>
        @elseif
            <form action="{{ route('parameters.update) }}" method="post">
                @csrf
                @method('UPDATE')
            </form>
        @endif
    </div>
</x-app-layout>