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
                    <h2><b>Proyectos</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="#addProjectModal" class="btn btn-primary" data-toggle="modal"><i class="material-icons">&#xE147;</i>Agregar Proyecto</a>
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
                    <th>Nombre del Proyecto</th>
                    <th>Porcentaje de Ejecución</th>
                    <th>ID del Contrato</th>
                    <th>ID del Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                    <tr>
                        <td>{{ $project->Name }}</td>
                        <td>{{ $project->Percentage_Completion }}</td>
                        <td>{{ $project->Contract_Id }}</td>
                        <td>{{ $project->State_Id }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="addProjectModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('addproject') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Nuevo Proyecto</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" id="nameProject" name="Name" value="{{old('Name')}}">
                            @if ($errors->has('Name'))
                            <p class="text-danger">{{ $errors->first('Name') }}</p>
                            <script>
                                $('#addProjectModal').modal('show');
                            </script>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Porcentaje ejecución</label>
                            <input type="text" class="form-control" id="Percentage_Completion" name="Percentage_Completion" value="{{old('Percentage_Completion')}}">
                            @if ($errors->has('Percentage_Completion'))
                            <p class="text-danger">{{ $errors->first('Percentage_Completion') }}</p>
                            <script>
                                $('#addProjectModal').modal('show');
                            </script>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Contrato</label>
                            <input type="text" class="form-control" id="IDContrato_Project" name="Contract_Id" value="{{old('Contract_Id')}}">
                            @if ($errors->has('Contract_Id'))
                            <p class="text-danger">{{ $errors->first('Contract_Id') }}</p>
                            <script>
                                $('#addProjectModal').modal('show');
                            </script>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Estado</label>
                            <input type="text" class="form-control" id="IDState_Project" name="State_Id" value="{{old('State_Id')}}">
                            @if ($errors->has('State_Id'))
                            <p class="text-danger">{{ $errors->first('State_Id') }}</p>
                            <script>
                                $('#addProjectModal').modal('show');
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
