<x-app-layout>
    <div>
        <form action="{{ route('parameters.save') }}" method="post">
            @csrf

            <label for="classes">Clases</label>
            <input type="text" name="classes_quantity" id="classes" value="@isset($parameters->classes_quantity) {{ $parameters->classes_quantity }} @endisset">

            <label for="promotion">Promoción</label>
            <input type="text" name="promotion_percentage" id="promotion" value="@isset($parameters->promotion_percentage) {{ $parameters->promotion_percentage }} @endisset">

            <label for="regular">Regular</label>
            <input type="text" name="regular_percentage" id="regular" value="@isset($parameters->regular_percentage) {{ $parameters->regular_percentage }} @endisset">
            
            <input type="submit" value="Guardar">
        </form>

        @if (Session::has('success'))
            {{ Session::get('success') }}
        @endif

    </div>
</x-app-layout>