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
                    <h2><b>Clientes</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="#addCustomerModal" class="btn btn-primary" data-toggle="modal"><i class="material-icons">&#xE147;</i>Agregar Cliente</a>
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
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Customers as $Customer)
                <tr class="selectable-row" data-url="#">
                    <td>{{ $Customer -> id }}</td>
                    <td>{{ $Customer -> name }}</td>
                    <td>{{ $Customer -> phone }}</td>
                    <td>{{ $Customer -> email }}</td>
                    <td style="text-align: center;">
                        <a href="#" class="edit" data-toggle="modal" data-id=""><i class="material-icons" title="Edit">&#xE254;</i></a>
                        <a href="#" class="delete" data-toggle="modal" data-id=""><i class="material-icons" title="Delete">&#xE872;</i></a>
                    </td>
                </tr>
                @endforeach               
            </tbody>
        </table>
    </div>

    <div id="addCustomerModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('addcustomer') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Nuevo Cliente</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Id</label>
                            <input type="text" class="form-control" id="idCustomer" name="id" value="{{old('id')}}">
                            @if ($errors->has('id'))
                            <p class="text-danger">{{ $errors->first('id') }}</p>
                            <script>
                                $('#addCustomerModal').modal('show');
                            </script>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" id="nameCustomer" name="name" value="{{old('name')}}">
                            @if ($errors->has('name'))
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                            <script>
                                $('#addCustomerModal').modal('show');
                            </script>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Telefono</label>
                            <input type="text" class="form-control" id="phoneCustomer" name="phone" value="{{old('phone')}}">
                            @if ($errors->has('phone'))
                            <p class="text-danger">{{ $errors->first('phone') }}</p>
                            <script>
                                $('#addCustomerModal').modal('show');
                            </script>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="text" class="form-control" id="emailCustomer" name="email" value="{{old('email')}}">
                            @if ($errors->has('email'))
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                            <script>
                                $('#addCustomerModal').modal('show');
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
