<x-app-layout>
    <div>
        <form action="{{ route('parameters.save') }}" method="post">
            @csrf

            <label for="classes">Clases</label>
            <input type="text" name="classes_quantity" id="classes" value="@isset($parameters->classes_quantity) {{ $parameters->classes_quantity }} @endisset"> <br>

            <label for="promotion">Promoción</label>
            <input type="text" name="promotion_percentage" id="promotion" value="@isset($parameters->promotion_percentage) {{ $parameters->promotion_percentage }} @endisset"> <br>

            <label for="regular">Regular</label>
            <input type="text" name="regular_percentage" id="regular" value="@isset($parameters->regular_percentage) {{ $parameters->regular_percentage }} @endisset"> <br>
            
            <input type="submit" value="Guardar" class="px-2 py-1 rounded text-lg bg-blue-500 text-white">
        </form>

        @if (Session::has('success'))
            {{ Session::get('success') }}
        @endif

    </div>
</x-app-layout>