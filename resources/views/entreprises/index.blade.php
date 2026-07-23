@extends('layouts.app')

@section('content')

<div class="container">

    <h2>Liste des entreprises</h2>

    <a href="{{ route('entreprises.create') }}" class="btn btn-primary">
        Ajouter une entreprise
    </a>

    <br><br>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table border="1" cellpadding="10">

        <thead>

            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Ville</th>
                <th>Actions</th>
            </tr>

        </thead>

        <tbody>

        @foreach($entreprises as $entreprise)

            <tr>

                <td>{{ $entreprise->id }}</td>

                <td>{{ $entreprise->nom }}</td>

                <td>{{ $entreprise->ville }}</td>

                <td>

                    <a href="{{ route('entreprises.show',$entreprise) }}">
                        Voir
                    </a>

                    |

                    <a href="{{ route('entreprises.edit',$entreprise) }}">
                        Modifier
                    </a>

                    |

                    <form
                        action="{{ route('entreprises.destroy',$entreprise) }}"
                        method="POST"
                        style="display:inline"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            onclick="return confirm('Supprimer ?')"
                        >
                            Supprimer
                        </button>

                    </form>

                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

</div>

@endsection