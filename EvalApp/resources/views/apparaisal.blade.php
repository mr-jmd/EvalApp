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
                    <a href="#addCustomerModal" class="btn btn-primary" data-toggle="modal"><i class="material-icons">&#xE147;</i>Agregar Avalúo</a>
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

</x-app-layout>
