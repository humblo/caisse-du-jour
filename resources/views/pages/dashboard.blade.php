@extends('layouts.default')
@section('content')
    <main class="dashboard">
        <div class="container">
            <div class="row justify-content-center">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <a href="{{ route('edit') }}" class="btn btn-outline-dark">+ Ajouter</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-3">
                        <div class="mb-3">
                            <h2>Total caisse</h2>
                            <div class="row justify-content-center mt-5" id="total-caisse">
                                <h1>{{ $total_caisse }} €</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-9">
                        <div class="mb-3">
                            <h2>Opération du jour</h2>
                        </div>
                        <div class="row">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Montant</th>
                                    <th scope="col">Retrait</th>
                                    <th scope="col">Ajouts</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($data))
                                    @foreach($data as $item)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($item['date'])->format('d M Y') }}</td>
                                            <td>
                                                @switch($item['type'])
                                                    @case (1)
                                                    Dépôt de caisse
                                                    @break
                                                    @case(2)
                                                    Remise en banque
                                                    @break
                                                    @case(3)
                                                    Retrait
                                                    @break
                                                @endswitch
                                            </td>
                                            <td>{{ $item['total'] }}</td>
                                            <td>{{ $item['retrait'] }}</td>
                                            <td>{{ $item['ajout'] }}</td>
                                            <td>{{ $item['total'] }}</td>
                                            <td class="actions">
                                                <a href="" class="btn btn-outline-info">Editer</a>
                                                <a href="#" class="btn btn-outline-danger delete-operation"
                                                   data-id="{{ $item['id'] }}">Supprimer</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr><td colspan="7">Aucune donnée n'est encore enregistrée dans la base de données</td></tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
