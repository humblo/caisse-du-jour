@extends('layouts.default')
@section('content')
    @include('partials.type.crud',[
    'h2' => __("Update type d'opération"),
    'route' => route('type.update',['typeoperation_id'=>$typeOperation['id']]),
    'value'=> $typeOperation['title']
]);
@endsection
