@extends('layouts.default')
@section('content')
    <main class="edit">
        <div class="container">
            <div class="row justify-content-center">
                <div class="row g-3">
                    <form name="form-caisse" id="form-caisse" method="post" action="{{ route('edit') }}">
                    @csrf
                    <!-- 1 -->
                        <div class="mb-3">
                            <h2>Entrée de fond de caisse</h2>
                        </div>
                        <!-- type d'operation --->
                    @include('components.fond-caisse',[
                        'type_operations'=>$type_operations,
                        'note' => '',
                        'date'=>'',
                        'typeoperation_id' => '',
                        'content' => ''
                    ])
                    <!-- 2 -->
                    @include('components.billets',[
                    'billets'=>$billets,
                    'content' => ''
                    ])
                    <!-- 3 -->
                    @include('components.pieces',[
                        'pieces'=>$pieces,
                         'content' => ''
                     ])
                    <!-- 4 -->
                        @include('components.centimes',[
                            'centimes'=>$centimes,
                            'content' => ''
                         ])
                        <div class="row mt-4 p-4 bloc-submit">
                            <div class="col-12 col-md-offset-12 text-center">
                                <button type="submit" class="btn btn-dark btn-block btn-lg">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--/-->
        @include('components.bloc-hidden')
        <!--/-->
        </div>
    </main>
@endsection
