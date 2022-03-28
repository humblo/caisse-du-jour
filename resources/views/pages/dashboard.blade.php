@extends('layouts.default')
@section('content')
    <main class="dashboard">
        <div class="container">
            <div class="row justify-content-center">
                <div class="row">
                    <div class="col-sm-12 col-md-3">
                        <div class="mb-3">
                            <h2>Total caisse</h2>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-9">
                        <div class="mb-3">
                            <h2>Entrée de fond de caisse</h2>
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
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
