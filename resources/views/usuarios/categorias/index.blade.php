@extends('usuarios.layouts.app')

@section('content')
<ul class="list-group">
    <li class="list-group-item"><h4 class="text-center">Categorias</h3></li>
</ul>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Gerenciar Categorias</h3>
            </div>
            <div class="panel-body">
                <form class="" action="{{url()->current()}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Nome:</label>
                        <input type="text" class="form-control" name="nome">
                    </div>
                    <div class="form-group">
                        <label>Cor:</label>
                        <input type="text" class="form-control" name="cor">
                    </div>
                    <button type="submit" class="btn btn-success">Adicionar</button>
                </form>
            </div>
            <div class="panel-footer" style="padding:0px;">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Data</th>
                        <th></th>
                    </tr>
                    @foreach($categorias as $categoria)
                    <tr>
                        <td>{{$categoria->id}}</td>
                        <td style="color:{{$categoria->cor}}" >{{$categoria->nome}}</td>
                        <td>{{$categoria->created_at}}</td>
                        <td>
                            <form action="{{ route('categorias.destroy' , $categoria->id)}}" method="POST">
                                <input name="_method" type="hidden" value="DELETE">
                                {{ csrf_field() }}
                                <a onclick="editarCategoria('{{$categoria->id}}','{{$categoria->nome}}','{{$categoria->cor}}')" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModal">Editar</a>

                                <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">

    function editarCategoria($id, $categoria, $cor) {
    $('#id').val($id);
    $('#nome').val($categoria);
    $('#cor').val($cor);
    $('#editarCategoria').modal('toggle');
    }

</script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{url()->current().'/editar'}}" method="post">
                <div class="modal-header">
                    <h4 class="modal-title" id="">Editar Tag</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    {!! method_field('PUT')!!}

                    {{ csrf_field() }}
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="">Tag</label>
                        <input type="text" class="form-control" id="cor" name="cor" placeholder="">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
