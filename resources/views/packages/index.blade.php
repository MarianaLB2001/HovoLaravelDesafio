<!DOCTYPE html>
<html>
    <head>
        <title>Encomendas</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container mt-4">
            <div class="card">
                <div class="card-header text-center font-weight-bold"> Ordem de Encomenda </div>
                <div class="card-body">
                    <form name="form" id="form" method="POST" action="{{route('packages.create')}}">
                        @csrf
                        <div>
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Inserir nome do cliente*"required="">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Inserir email do cliente*" required="">
                            </div>
                            <div class="form-group">
                                <label>Transportadora</label>
                                <select id="transport" name="transport" class="form-control" required="">
                                    <option value="0" disabled="false" selected="false">Selecione uma Transportadora</option>
                                    <option> DHL 1 </option>
                                    <option> DHL 2 </option>
                                    <option> DHL 3 </option>
                                    <option> DHL 4 </option>
                                </select>
                            </div>
                            <br>

                            <h5>Adicionar Produto</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Produto</label>
                                        <select id="product" name="product" class="form-control" required="">
                                            <option value="0" disabled="false" selected="false">Selecione um Produto</option>
                                            <option> Produto 1</option>
                                            <option> Produto 2 </option>
                                            <option> Produto 3 </option>
                                            <option> Produto 4 </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Quantidade</label>
                                        <input type="number" id="amount" name="amount" class="form-control" placeholder="Qtd*" required=""></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary" style="background-color: rgb(13, 159, 204); color:white">Adicionar à Encomenda</button>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('packages.list')}}" class="btn btn-primaty" style="background-color: rgb(13, 159, 204); color:white">Ver Encomenda</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </body>
</html>
