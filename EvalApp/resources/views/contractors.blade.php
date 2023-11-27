<x-app-layout>

    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script>
            $(document).ready(function() {
                $(document).on('click', '.delete', function() {
                    var id = $(this).data("id");    
                    $('#did').val(id);
                    console.log(id);
                });

                $(document).on('click', '.edit', function() {
                    var id = $(this).data("id");
                    var name = $('#name' + id).text();
                    var phone = $('#phone' + id).text();
                    var email = $('#email' + id).text();

                    $('#uid').val(id);
                    $('#uname').val(name);
                    $('#uphone').val(phone);
                    $('#uemail').val(email);

                    console.log(name)
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

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2><b>Contratistas</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="#addContractor" class="btn btn-primary" data-toggle="modal"><i class="material-icons">&#xE147;</i>Agregar Contratista</a>
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
                @foreach($contractors as $contractor)
                <tr class="selectable-row" data-url="#">
                    <td>{{ $contractor -> id }}</td>
                    <td><span id="name<?php echo $contractor -> id ?>">{{ $contractor -> name }}</span></td>
                    <td><span id="phone<?php echo $contractor -> id ?>">{{ $contractor -> phone }}</span></td>
                    <td><span id="email<?php echo $contractor -> id ?>">{{ $contractor -> email }}</span></td>
                    <td style="text-align: center;">
                        <a href="#updateContractors" class="edit" data-toggle="modal" data-id="<?php echo $contractor->id ?>"><i class="material-icons" title="Edit">&#xE254;</i></a>
                        <a href="#deleteContractors" class="delete" data-toggle="modal" data-id="<?php echo $contractor->id ?>"><i class="material-icons" title="Delete">&#xE872;</i></a>
                    </td>
                </tr>
                @endforeach               
            </tbody>
        </table>
    </div>

    <div id="addContractor" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('addcontractor') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Nuevo Contratista</h4>
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

    <div id="deleteContractors" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('deleteContractors') }}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="modal-header">
                        <h4 class="modal-title">Borrar Contratista</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>¿Está seguro de que desea eliminar este contratista?</p>
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

    <div id="updateContractors" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('updateContractors') }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="modal-header">
                        <h4 class="modal-title">Editar Contratista</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">                            
                            <input type="hidden" class="form-control" id="uid" name="id" value="{{old('id')}}" require>
                        </div>
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" id="uname" name="name" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label>Telefono</label>
                            <input type="text" class="form-control" id="uphone" name="phone" value="{{old('phone')}}">
                        </div>
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="text" class="form-control" id="uemail" name="email" value="{{old('email')}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
