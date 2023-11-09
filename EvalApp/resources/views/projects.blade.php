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
                    <a href="#addCustomerModal" class="btn btn-primary" data-toggle="modal"><i class="material-icons">&#xE147;</i>Agregar Proyecto</a>
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

</x-app-layout>
