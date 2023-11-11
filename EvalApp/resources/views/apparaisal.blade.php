<x-app-layout>

    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
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
                    <h2><b>Avalúos</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="#addApparaisalModal" class="btn btn-primary" data-toggle="modal"><i class="material-icons">&#xE147;</i>Agregar Avalúo</a>
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
                    <th>Consecutivo</th>
                    <th>Dirección</th>
                    <th>ID Proyecto</th>
                    <th>ID Contrato</th>
                    <th>ID Ciudad</th>
                    <th>Fecha creación</th>
                    <th>Fecha actualización</th>
                </tr>
            </thead>
            <tbody>
                @foreach($apparaisal as $apparaisal)
                <tr>
                    <td>{{ $apparaisal->id }}</td>
                    <td>{{ $apparaisal->consecutive }}</td>
                    <td>{{ $apparaisal->address }}</td>
                    <td>{{ $apparaisal->id_project }}</td>
                    <td>{{ $apparaisal->id_contractor }}</td>
                    <td>{{ $apparaisal->id_city }}</td>
                    <td>{{ $apparaisal->created_at }}</td>
                    <td>{{ $apparaisal->updated_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="addApparaisalModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('addapparaisal') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Nuevo Avalúo</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Consecutivo</label>
                            <input type="text" class="form-control" id="consecutive" name="consecutive" value="{{old('consecutive')}}">
                            @if ($errors->has('consecutive'))
                            <p class="text-danger">{{ $errors->first('consecutive') }}</p>
                            <script>
                                $('#addApparaisalModal').modal('show');
                            </script>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{old('address')}}">
                            @if ($errors->has('address'))
                            <p class="text-danger">{{ $errors->first('address') }}</p>
                            <script>
                                $('#addApparaisalModal').modal('show');
                            </script>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>ID Proyecto</label>
                            <input type="text" class="form-control" id="id_project" name="id_project" value="{{old('id_project')}}">
                            @if ($errors->has('id_project'))
                            <p class="text-danger">{{ $errors->first('id_project') }}</p>
                            <script>
                                $('#addApparaisalModal').modal('show');
                            </script>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>ID Contratista</label>
                            <input type="text" class="form-control" id="id_contractor" name="id_contractor" value="{{old('id_contractor')}}">
                            @if ($errors->has('id_contractor'))
                            <p class="text-danger">{{ $errors->first('id_contractor') }}</p>
                            <script>
                                $('#addApparaisalModal').modal('show');
                            </script>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>ID Ciudad</label>
                            <input type="text" class="form-control" id="id_city" name="id_city" value="{{old('id_city')}}">
                            @if ($errors->has('id_city'))
                            <p class="text-danger">{{ $errors->first('id_city') }}</p>
                            <script>
                                $('#addApparaisalModal').modal('show');
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

</x-app-layout>
