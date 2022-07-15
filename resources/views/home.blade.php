@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
         Olá {{$nome}}! Seu ultimo acesso foi em: {{$login}}
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection