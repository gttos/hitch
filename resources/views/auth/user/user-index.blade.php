@extends('auth/layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Tables /</span> Basic Tables
    </h4>

    <hr class="my-5">

    <!-- Striped Rows -->
    <div class="card">
        <h5 class="card-header">Striped rows</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Admin</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach( $users as $user )
                    <tr>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if( $user->username )
                                <span class="badge bg-label-secondary me-1">{{ $user->username }}</span>
                            @else
                                <span class="badge bg-label-secondary me-1">NO</span>
                            @endif
                        </td>
                        <td>
                            @if( $user->is_admin )
                                <span class="badge bg-label-primary me-1">YES</span>
                            @else
                                <span class="badge bg-label-secondary me-1">NO</span>
                            @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('auth.user-edit', $user->id) }}"><i
                                                class="bx bx-edit-alt me-1"></i>
                                        Edit</a>
                                    <form action="{{ route('auth.user-delete', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item"><i class="bx bx-trash me-1"></i>
                                            Delete
                                        </button>
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
