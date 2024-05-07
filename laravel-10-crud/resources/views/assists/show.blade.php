@extends('layouts.crud')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Student Assists
                </div>
                <div class="float-end">
                    <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <table>
                    <th>Fecha y Hora</th>
                    @foreach ($assists as $assist)
                    <tr>
                        <td>{{ $assist->created_at }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>    
</div>
    
@endsection