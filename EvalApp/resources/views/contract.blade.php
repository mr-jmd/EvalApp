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
                    <a href="#addCustomerModal" class="btn btn-primary" data-toggle="modal"><i class="material-icons">&#xE147;</i>Agregar Contratista</a>
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
                    <th>URL del Documento</th>
                    <th>ID de la Línea de Negocio</th>
                    <th>ID del Cliente</th>
                    <th>ID del Estado</th>
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
                    <td>{{ $contract->Document_URL }}</td>
                    <td>{{ $contract->Business_Line_Id }}</td>
                    <td>{{ $contract->Customer_Id }}</td>
                    <td>{{ $contract->State_Id }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
