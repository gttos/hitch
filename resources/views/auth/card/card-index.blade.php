@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Tables /</span> Basic Tables
    </h4>

    <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item"><a class="nav-link active" href="{{route('auth.card-create')}}"><i class="bx bx-plus me-1"></i>Agregar</a></li>
    </ul>

    <!-- Striped Rows -->
    <div class="card">
        <h5 class="card-header">Striped rows</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Titular</th>
                    <th>Categoría</th>
                    <th>Fecha de Creación</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach( $cards as $card)
                    <tr>
                        <td>{{ Str::limit($card->title, 40) }}..</td>
                        <td><span class="badge bg-label-primary me-1"> {{ $card->category->name }}</span></td>
                        <td><span class="badge bg-label-secondary me-1"> {{ $card->created_at->format('Y-m-d') }}</span></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('auth.card-edit', $card->id) }}"><i
                                                class="bx bx-edit-alt me-1"></i>
                                        Edit</a>
                                    <form action="{{ route('auth.card-delete', $card->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-primary-button class="dropdown-item"><i class="bx bx-trash me-1"></i>
                                            Delete</x-primary-button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Striped Rows -->
@endsection
