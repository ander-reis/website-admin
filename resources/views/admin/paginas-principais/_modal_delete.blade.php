<!-- Modal -->
<div class="modal fade" id="deletePaginaModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa fa-exclamation-circle fa-2x text-danger" aria-hidden="true"></i>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(['route' => ['admin.paginas.destroy', 'paginas' => 'pagina'], 'method' => 'DELETE']) }}
            {{ Form::hidden('redirects_to', URL::full()) }}
            {{ Form::hidden('id_pagina', null, ['class' => 'form-control', 'id' => 'id-pagina']) }}
            <div class="modal-body">
                <h3>Excluir Cláusula?</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                <button type="submit" class="btn btn-danger">Sim</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
