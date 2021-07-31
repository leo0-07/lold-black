@extends('layouts.master')

@section('title') Editar Anotação @endsection

@section('content')
    <form action="{{ route('notas.update', $nota->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="card card-default">
            <div class="card-header">
                Editar anotação
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="pchave">Palavra chave</label>
                    <input type="text" class="form-control @if($errors->has('pchave')) is-invalid @endif" name="pchave"
                           value="{{ $nota->pchave }}">
                    @if($errors->has('pchave'))
                        <div class="invalid-feedback">{{ $errors->first('pchave') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="descrição">Descrição</label>
                    <textarea cols="5" rows="8" class="form-control @if($errors->has('descrição')) is-invalid @endif"
                              name="descrição">{{ $nota->descrição }}</textarea>
                    @if($errors->has('conteúdo'))
                        <div class="invalid-feedback">{{ $errors->first('descrição') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="conteúdo">Conteúdo</label>
                    <textarea cols="5" rows="16" class="form-control @if($errors->has('conteúdo')) is-invalid @endif"
                              name="conteúdo">{{ $nota->conteúdo }}</textarea>
                    @if($errors->has('conteúdo'))
                        <div class="invalid-feedback">{{ $errors->first('conteúdo') }}</div>
                    @endif
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Atualizar</button>
                <a href="{{ route('notas.index') }}" class="btn btn-default">Cancelar</a>
            </div>
        </div>
    </form>
@endsection
