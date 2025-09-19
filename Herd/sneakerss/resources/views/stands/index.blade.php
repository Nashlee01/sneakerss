@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Beheer Standen</h1>
        <a href="{{ route('stands.create') }}" class="btn btn-primary">Nieuwe Stand</a>
    </div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            @if($stands->isEmpty())
                <p>Nog geen stands beschikbaar.</p>
            @else
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Naam</th>
                                <th>Locatie</th>
                                <th>Acties</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stands as $stand)
                                <tr>
                                    <td>{{ $stand->naam }}</td>
                                    <td>{{ $stand->locatie }}</td>
                                    <td>
                                        <a href="{{ route('stands.show', $stand) }}" class="btn btn-sm btn-info">Bekijk</a>
                                        <a href="{{ route('stands.edit', $stand) }}" class="btn btn-sm btn-warning">Bewerk</a>
                                        <form action="{{ route('stands.destroy', $stand) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Weet je zeker dat je deze stand wilt verwijderen?')">Verwijder</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
