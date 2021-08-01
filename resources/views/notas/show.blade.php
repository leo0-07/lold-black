@extends('layouts.master')

@section('title') Ver anoração @endsection
<a href="http://www.brdsoft.com.br"><img src="/logo-azul-com-texto.png"style="width:120px;height:60px;"></a><br>
@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('notas.index') }}" class="btn btn-info pull-right mb-3">Voltar</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th>Palavra chave</th>
                <td>{{ $nota->pchave }}</td>
            </tr>
            <tr>
                <th>Descrição</th>
                <td>{{ $nota->descrição }}</td>
            </tr>
            <tr>
                <th>Conteúdo</th>
                <td>{{ $nota->conteúdo }}</td>
            </tr>
        </table>
    </div>
@endsection
