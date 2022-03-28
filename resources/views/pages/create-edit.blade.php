@extends('layouts.default')
@section('content')
    <main class="edit">
        <div class="container">
            <div class="row justify-content-center">
                <div class="row g-3">
                    <form name="" method="" action="">
                    @csrf
                    <!-- 1 -->
                        <div class="mb-3">
                            <h2>Entrée de fond de caisse</h2>
                        </div>
                        <!-- type d'operation --->
                        <div class="row p-4">
                            <div class="col-md-6 mb-3">
                                <label for="operation" class="form-label">Type d'opération</label>
                                <select id="operation" class="form-select">
                                    <option selected>Choisir...</option>
                                    <option>Dépôt de caisse</option>
                                    <option>Remise en banque</option>
                                    <option>Retrait</option>
                                </select>
                            </div>
                            <div class="col-md-6 operation-value display-input" id="total-caisse">
                                0€
                            </div>
                            <!-- /type d'operation -->
                            <!-- Date --->
                            <div class="col-md-6 mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date">
                            </div>
                            <div class="col-md-6">
                                &nbsp;
                            </div>
                            <!-- / date -->
                            <!-- Note -->
                            <div class="col-12">
                                <label for="note" class="form-label">Note</label>
                                <textarea rows="3" cols="" name="note" id="note" class="form-control"></textarea>
                            </div>
                            <!-- /Note -->
                        </div>
                        <!-- 2 -->
                        <div class="mb-3 mt-5">
                            <h2>Billets</h2>
                        </div>
                        <div class="p-4 box-billet" data-type="billet">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="operation" class="form-label">Nominal</label>
                                    <select name="billet[1][operation]" id="billet_operation_1"
                                            class="form-select form-control">
                                        @foreach($billets as $billet)
                                            <option value="{{ $billet }}">{{ $billet }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="" class="form-label">Quantité</label>
                                    <input name="billet[1][quantite]" id="billet_quantite_1" class="form-control"/>
                                </div>
                                <div class="col-md-4 billet-value display-input-1">
                                    0€
                                </div>
                            </div>
                        </div>
                        <div class="col-12 px-4 py-2">
                            <input type="hidden" name="counter-billet" id="counter-billet" value="1">
                            <input type="hidden" name="total-billet" id="total-billet" value="0">
                            <button type="button" class="btn btn-success cta-add" id="add-billet"
                                    data-type="billet">Ajouter
                            </button>
                        </div>

                        <!-- 3 -->
                        <div class="mb-3 mt-5">
                            <h2>Pièces</h2>
                        </div>
                        <div class="p-4 box-piece" data-type="piece">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="operation" class="form-label">Nominal</label>
                                    <select name="piece[1][operation]" id="piece_operation_1"
                                            class="form-select form-control">
                                        @foreach($pieces as $piece)
                                            <option value="{{ $piece }}">{{ $piece }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="" class="form-label">Quantité</label>
                                    <input name="piece[1][quantite]" id="piece_quantite_1" class="form-control"/>
                                </div>
                                <div class="col-md-4 piece-value display-input-1">
                                    0€
                                </div>
                            </div>
                        </div>
                        <div class="col-12 px-4 py-2">
                            <input type="hidden" name="counter-piece" id="counter-piece" value="1">
                            <input type="hidden" name="total-piece" id="total-piece" value="0">
                            <button type="button" class="btn btn-success cta-add" id="add-piece" data-type="piece">
                                Ajouter
                            </button>
                        </div>

                        <!-- 4 -->
                        <div class="mb-3 mt-5">
                            <h2>Centimes</h2>
                        </div>
                        <div class="p-4 box-centime" data-type="centime">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="operation" class="form-label">Nominal</label>
                                    <select id="centime_operation_1" name="centime[1][operation]"
                                            class="form-select form-control">
                                        @foreach($centimes as $centime)
                                            <option value="{{ $centime }}">{{ $centime }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="form-label">Quantité</label>
                                    <input name="centime[1][quantite]" id="centime_quantite_1" class="form-control"/>
                                </div>
                                <div class="col-md-4 centime-value display-input-1">
                                    0€
                                </div>
                            </div>
                        </div>
                        <div class="col-12 px-4 py-2">
                            <input type="hidden" name="counter-centime" id="counter-centime" value="1">
                            <input type="hidden" name="total-centime" id="total-centime" value="0">
                            <button type="submit" class="btn btn-success cta-add" id="add-centime"
                                    data-type="centime">Ajouter
                            </button>
                        </div>

                        <div class="row mt-4 p-4 bloc-submit">
                            <div class="col-12 col-md-offset-12 text-center">
                                <button type="submit" class="btn btn-dark btn-block btn-lg">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--/-->
            <div id="box-hidden" style="display: none">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="operation" class="form-label">Nominal</label>
                        <select name="" id="" class="form-select nominal-select form-control">
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label">Quantité</label>
                        <input name="" id="" class="form-control quantite"/>
                    </div>
                    <div class="col-md-4 display-input-2 pt-3">
                        <a class="btn btn-danger delete">
                            Supprimer
                        </a>
                    </div>
                </div>
            </div>
            <!--/-->
        </div>
    </main>
@endsection
