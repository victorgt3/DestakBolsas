@extends('template.temp')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
              <ol class="breadcrumb panel-heading">
                    <li><a href="{{url('/home')}}">Home</a></li>
                    <li class="active">Lista de produtos</li>
                </ol>
        	<div class="box-body">
              <table id="example2" class="table table-bordered table-hover">

                <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Nome</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                         @foreach($produto as $produtos)  
                        <tbody>
                           

                            <tr>
                                <th>{{$produtos->id}}</th>
                                <td>{{$produtos->nome}}</td>
                                <td>
                             
                                    <a class="btn btn-info" href="{{route('produtos.edit',$produtos->id)}}">Editar</a>
                                    <a class="btn btn-warning" href="#">Detalhe</a>
                                    <a class="btn btn-danger" href="#">Deletar</a>
                            
                                </td>
                            </tr>                            

                         
                            
                        </tbody>

                         @endforeach   
                        
                             
                       
                    </table>
                   
                            <div align="center">
                               
                            </div>
                 

            </div>
                   
            </div>
         </div>
     </div>
</div>

@endsection