@extends('layouts.default')
@section('content')
    <main class="dashboard">
        <div class="container">
            <div class="row justify-content-center">
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
                                @if($operations)
                                    @foreach($operations as $operation)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($operation['date'])->format('d M Y') }}</td>
                                            <td>
                                                {{ $operation->typeoperation->title }}
                                            </td>
                                            <td>{{ $operation['total'] }}</td>
                                            <td>{{ $operation['retrait'] }}</td>
                                            <td>{{ $operation['ajout'] }}</td>
                                            <td>{{ $operation['total'] }}</td>
                                            <td class="actions">
                                                <a href="{{ route('page.update',['operation_id'=>$operation['id']]) }}"
                                                   class="btn btn-outline-info">Editer</a>
                                                <a href="#" class="btn btn-outline-danger delete-operation"
                                                   data-id="{{ $operation['id'] }}">Supprimer</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7">Aucune donnée n'est encore enregistrée dans la base de données
                                        </td>
                                    </tr>
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
