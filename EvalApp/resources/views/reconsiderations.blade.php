<x-app-layout>

    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script>
            $(document).ready(function() {
                $(document).on('click', '.delete', function() {
                    var id = $(this).data("id");    
                    $('#did').val(id);
                });
            });
        </script>
    </head>
    <x-slot name="header">  </x-slot>
     
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2><b>Reconsideraciones</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="#addReconsiderationsModal" class="btn btn-primary" data-toggle="modal"><i class="material-icons">&#xE147;</i>Agregar Reconsideración</a>
                    <div class="search-box">
                        <i class="material-icons">&#xE8B6;</i>
                        <input id="search-input" type="text" class="form-control" placeholder="Search&hellip;">
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover table-bordered">

            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Fecha recepción</th>
                    <th>Fecha respuesta</th>
                    <th>ID Tipo Reconsideración</th>
                    <th>ID Estado</th>
                    <th>ID Avalúo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reconsiderations as $reconsideration)
                <tr class="selectable-row" data-url="#">
                    <td>{{ $reconsideration -> id }}</td>
                    <td>{{ $reconsideration -> name }}</td>
                    <td>{{ $reconsideration -> receptionDate }}</td>
                    <td>{{ $reconsideration -> responseDate }}</td>
                    <td>{{ $reconsideration -> id_reconsiderationType }}</td>
                    <td>{{ $reconsideration -> id_status }}</td>
                    <td>{{ $reconsideration -> id_appraisal }}</td>
                    <td style="text-align: center;">
                        <a href="#" class="edit" data-toggle="modal" data-id=""><i class="material-icons" title="Edit">&#xE254;</i></a>
                        <a href="#deleteReconsiderations" class="delete" data-toggle="modal" data-id="<?php echo $reconsideration->id ?>"><i class="material-icons" title="Delete">&#xE872;</i></a>

                    </td>
                </tr>
                @endforeach               
            </tbody>
        </table>
    </div>

    <div id="addReconsiderationsModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('addreconsiderations') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Nueva Reconsideración</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                            @if ($errors->has('name'))
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                            <script>
                                $('#addReconsiderationsModal').modal('show');
                            </script>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Fecha de recepción</label>
                            <input type="text" class="form-control" id="receptionDate" name="receptionDate" value="{{old('receptionDate')}}">
                            @if ($errors->has('receptionDate'))
                            <p class="text-danger">{{ $errors->first('receptionDate') }}</p>
                            <script>
                                $('#addReconsiderationsModal').modal('show');
                            </script>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Fecha de respuesta</label>
                            <input type="text" class="form-control" id="responseDate" name="responseDate" value="{{old('responseDate')}}">
                            @if ($errors->has('responseDate'))
                            <p class="text-danger">{{ $errors->first('responseDate') }}</p>
                            <script>
                                $('#addReconsiderationsModal').modal('show');
                            </script>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>ID Tipo Reconsideración</label>
                            <input type="text" class="form-control" id="id_reconsiderationType" name="id_reconsiderationType" value="{{old('id_reconsiderationType')}}">
                            @if ($errors->has('id_reconsiderationType'))
                            <p class="text-danger">{{ $errors->first('id_reconsiderationType') }}</p>
                            <script>
                                $('#addReconsiderationsModal').modal('show');
                            </script>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>ID Estado</label>
                            <input type="text" class="form-control" id="id_status" name="id_status" value="{{old('id_status')}}">
                            @if ($errors->has('id_status'))
                            <p class="text-danger">{{ $errors->first('id_status') }}</p>
                            <script>
                                $('#addReconsiderationsModal').modal('show');
                            </script>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>ID Avalúo</label>
                            <input type="text" class="form-control" id="id_appraisal" name="id_appraisal" value="{{old('id_appraisal')}}">
                            @if ($errors->has('id_appraisal'))
                            <p class="text-danger">{{ $errors->first('id_appraisal') }}</p>
                            <script>
                                $('#addReconsiderationsModal').modal('show');
                            </script>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Agregar</button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="deleteReconsiderations" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('deleteReconsiderations') }}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="modal-header">
                        <h4 class="modal-title">Borrar Reconsideración</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>¿Está seguro de que desea eliminar esta Reconsideración?</p>
                        <p class="text-warning"><small>Esta acción no se puede deshacer.</small></p>
                        <input type="hidden" class="form-control" id="did" name="id" value="{{old('id')}}" require>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
