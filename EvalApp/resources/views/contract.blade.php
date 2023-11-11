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
                    <h2><b>Contratos</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="#addContractModal" class="btn btn-primary" data-toggle="modal"><i class="material-icons">&#xE147;</i>Agregar Contrato</a>
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
                    <th>Número de Contrato</th>
                    <th>Número de Propuesta</th>
                    <th>Fecha de Aprobación</th>
                    <th>Fecha de Entrega</th>
                    <th>Días de Vencimiento</th>
                    <th>Alcance</th>
                    <th>Valor del Contrato</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contracts as $contract)
                <tr>
                    <td>{{ $contract->Contract_Number }}</td>
                    <td>{{ $contract->Proposal_Number }}</td>
                    <td>{{ $contract->Approval_Date }}</td>
                    <td>{{ $contract->Delivery_Date }}</td>
                    <td>{{ $contract->Days_Due }}</td>
                    <td>{{ $contract->Scope }}</td>
                    <td>{{ $contract->Contract_Value }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="addContractModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('addcontract') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Nuevo Contrato</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Número contrato</label>
                            <input type="text" class="form-control" id="Contract_Number" name="Contract_Number" value="{{old('Contract_Number')}}">
                            @if ($errors->has('Contract_Number'))
                            <p class="text-danger">{{ $errors->first('Contract_Number') }}</p>
                            <script>
                                $('#addContractModal').modal('show');
                            </script>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Propuesta</label>
                            <input type="text" class="form-control" id="Proposal_Number" name="Proposal_Number" value="{{old('Proposal_Number')}}">
                            @if ($errors->has('Proposal_Number'))
                            <p class="text-danger">{{ $errors->first('Proposal_Number') }}</p>
                            <script>
                                $('#addContractModal').modal('show');
                            </script>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Fecha aprobación</label>
                            <input type="text" class="form-control" id="Approval_Date" name="Approval_Date" value="{{old('Approval_Date')}}">
                            @if ($errors->has('Approval_Date'))
                            <p class="text-danger">{{ $errors->first('Approval_Date') }}</p>
                            <script>
                                $('#addContractModal').modal('show');
                            </script>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Fecha entrega</label>
                            <input type="text" class="form-control" id="Delivery_Date" name="Delivery_Date" value="{{old('Delivery_Date')}}">
                            @if ($errors->has('Delivery_Date'))
                            <p class="text-danger">{{ $errors->first('Delivery_Date') }}</p>
                            <script>
                                $('#addContractModal').modal('show');
                            </script>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Plazo en días</label>
                            <input type="text" class="form-control" id="Days_Due" name="Days_Due" value="{{old('Days_Due')}}">
                            @if ($errors->has('Days_Due'))
                            <p class="text-danger">{{ $errors->first('Days_Due') }}</p>
                            <script>
                                $('#addContractModal').modal('show');
                            </script>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Alcance</label>
                            <input type="text" class="form-control" id="Scope" name="Scope" value="{{old('Scope')}}">
                            @if ($errors->has('Scope'))
                            <p class="text-danger">{{ $errors->first('Scope') }}</p>
                            <script>
                                $('#addContractModal').modal('show');
                            </script>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Valor del contrato</label>
                            <input type="text" class="form-control" id="Contract_Value" name="Contract_Value" value="{{old('Contract_Value')}}">
                            @if ($errors->has('Contract_Value'))
                            <p class="text-danger">{{ $errors->first('Contract_Value') }}</p>
                            <script>
                                $('#addContractModal').modal('show');
                            </script>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>URL Documentos</label>
                            <input type="text" class="form-control" id="Document_URL" name="Document_URL" value="{{old('Document_URL')}}">
                            @if ($errors->has('Document_URL'))
                            <p class="text-danger">{{ $errors->first('Document_URL') }}</p>
                            <script>
                                $('#addContractModal').modal('show');
                            </script>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>ID Linea de servicio</label>
                            <input type="text" class="form-control" id="Business_Line_Id" name="Business_Line_Id" value="{{old('Business_Line_Id')}}">
                            @if ($errors->has('Business_Line_Id'))
                            <p class="text-danger">{{ $errors->first('Business_Line_Id') }}</p>
                            <script>
                                $('#addContractModal').modal('show');
                            </script>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>ID cliente</label>
                            <input type="text" class="form-control" id="Customer_Id" name="Customer_Id" value="{{old('Customer_Id')}}">
                            @if ($errors->has('Customer_Id'))
                            <p class="text-danger">{{ $errors->first('Customer_Id') }}</p>
                            <script>
                                $('#addContractModal').modal('show');
                            </script>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>ID estado</label>
                            <input type="text" class="form-control" id="State_Id" name="State_Id" value="{{old('State_Id')}}">
                            @if ($errors->has('State_Id'))
                            <p class="text-danger">{{ $errors->first('State_Id') }}</p>
                            <script>
                                $('#addContractModal').modal('show');
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
