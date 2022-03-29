@extends('layouts.default')
@section('content')
    <main class="dashboard">
        <div class="container">
            <div class="row justify-content-center">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="mb-3">
                            <h2>Gestion type d'opérations<a href="{{ route('type.add') }}" class="btn btn-outline-success" style="float: right">Ajouter</a></h2>

                        </div>
                        <div class="row p-4">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($type_operations))
                                    @foreach($type_operations as $item)
                                        <tr>
                                            <td>{{ $item['id'] }}</td>
                                            <td>{{ $item['title'] }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item['created_at'])->format('d M Y') }}</td>
                                            <td class="actions">
                                                <a href="{{ route('type.edit',['typeoperation_id'=>$item['id']]) }}"
                                                   class="btn btn-outline-info">Editer</a>
                                                <a href="{{ route('type.delete',['typeoperation_id'=>$item['id']]) }}" class="btn btn-outline-danger"
                                                   data-id="{{ $item['id'] }}">Supprimer</a>
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
