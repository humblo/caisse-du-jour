@extends('layouts.default')
@section('content')
    @include('partials.type.crud',[
        'h2' => __("Ajout type d'opération"),
        'route' => route('type.add'),
        'value'=>""
    ]);
@endsection
