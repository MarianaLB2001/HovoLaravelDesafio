<!DOCTYPE html>
<html>
    <head>
        <title>Encomendas</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    </head>

    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

        <?php
        if(!isset($id))
        {
            $id="";
        }

        $total = 0;
        ?>

        <div class="container mt-4">
            <div class="card">
                <div class="card-header text-center font-weight-bold">Lista de Produtos</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Produto</th>
                                    <th class="text-center">Quantidade</th>
                                    <th class="text-center">Preço/Unid.</th>
                                </tr>
                            </thead>
                            {{-- @foreach ($packages as $package) --}}
                            @foreach ($encomendas as $encomenda)
                            <tr>
                                {{-- <td>{{$package->product}}</td>
                                <td>{{$package->amount}}</td>
                                <td>{{$product->price}}</td> --}}

                                <td>{{$encomenda->product}}</td>
                                <td>{{$encomenda->amount}}</td>
                                <td>{{$encomenda->price}}</td>

                                <?php

                                    $subtotal = $encomenda->amount * $encomenda->price;
                                    $email = $encomenda->email;
                                    $total = $total + $subtotal;
                                ?>

                                <td>
                                    <a href="{{route('packages.delete', $encomenda->id)}}"><i class="fas fa-trash text-danger ms-2"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{route('packages')}}" class="btn btn-primaty" style="background-color: rgb(13, 159, 204); color:white">Adicionar mais produtos</a>
                        </div>
                        <div class="col-md-6">
                            <form method="post" action="{{route('packages.destroy')}}">
                                @csrf
                                @method('post')

                                <button type="submit" class="btn btn-primary" style="background-color: rgb(13, 159, 204); color:white">Submeter Encomenda ({{$total}})€</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <script>
        $(document).ready(function(){
            $('#dataTable').DataTable();
        })
        </script>
    </body>
</html>
