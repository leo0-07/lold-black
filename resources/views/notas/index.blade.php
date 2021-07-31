@extends('layouts.master')

@section('title') Anotações @endsection

@section('content')
<a href="http://www.brdsoft.com.br"><img src="/logo-azul-com-texto.png"style="width:240px;height:120px;"></a><br>
<h3>Old black web</h3>
<p>Sistema para anotações e apontamentos.</p>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('notas.create') }}" class="btn btn-primary pull-right mb-3">Nova anotação</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Palavra chave</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @forelse($notas as $nota)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $nota->pchave }}</td>
                    <td>{{ $nota->descrição }}</td>
                    <td>
                            <a href="{{ route('notas.edit', $nota->id) }}" type="button" class="btn btn-primary"><i class="fa fa-edit"></i></a>

                            <a href="{{ route('notas.show', $nota->id) }}" type="button" class="btn btn-info"><i class="fa fa-eye"></i></a>

                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_nota_{{ $nota->id }}">
                                <i class="fa fa-trash"></i>
                            </button>

   <div class="modal fade" id="delete_nota_{{ $nota->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{ route('notas.destroy', $nota->id) }}" id="form_delete_nota_{{ $nota->id }}" method="post">
                                        @csrf
                                        @method('DELETE');
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirmar exclusão</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Quer mesmo excluir "<b>{{ $nota->pchave }}</b>" das anotações?
                                            </div>
						<div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                                                <button type="submit" class="btn btn-danger">Sim excluir anotação!</button>
                                            </div>
					</div>
                                    </form>
                                </div>
                            </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" align="center">Nenhuma anoptação encontrada.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="row">
        {{ $notas->links() }}
    </div>
@endsection
