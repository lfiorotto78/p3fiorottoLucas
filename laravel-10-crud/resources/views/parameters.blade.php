<x-app-layout>
    <div>
        @dd(empty($parameters))
        @if (empty($parameters))
            <form action="#" method="post">
                @csrf

                <label for="classes">Clases</label>
                <input type="text" name="classes_quantity" id="classes">

                <label for="promotion">Promoción</label>
                <input type="text" name="promotion_percentage" id="promotion">

                <label for="regular">Regular</label>
                <input type="text" name="regular_percentage" id="regular">
                
                <input type="submit" value="Guardar">
            </form>
        @else
            <form action="#" method="post">
                @csrf
                @method("PUT")

                <p>No seteado</p>
            </form>
        @endif
    </div>
</x-app-layout>