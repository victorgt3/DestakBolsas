@extends('template.temp')

@section('content')
<div class="container">
	<div>
         <h1 style="text-align: center;">Categorias</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">                
                <ol class="breadcrumb panel-heading">
                    <li><a href="{{url('/home')}}">Home</a></li>
                    <li class="active">Categorias</li>
                </ol>

                <div class="panel-body">                                    
                    <form action="{{url('/categorias/salvar')}}" method="post">
                        {{ csrf_field() }}
                        
                         <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control" placeholder="Nome da Categoria">
                            @if($errors->has('nome'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nome') }}</strong>
                                </span>
                            @endif
                        </div>                       
                        <button class="btn btn-info">Salvar</button>
                        
                    </form>
                    

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" style=" width: 96%;">
            <div class="panel panel-default">
               
        	<div class="box-body">
            
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Nome</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        @foreach($categorias as $categoria)
                        <tbody>
                           

                            <tr>
                                <th>{{$categoria->id}}</th>
                                <td>{{$categoria->nome}}</td>
                                <td>
                                    <a class="btn btn-default" href="#">Editar</a>
                                    <a class="btn btn-danger" href="javascript:(confirm('Deletar esse registro?') ? window.location.href='#' : false)">Deletar</a>
                                </td>
                            </tr>                            

                         
                            
                        </tbody>

                        @endforeach
                            
                             
                       
                    </table>

                    <div align="center">
                                {{$categorias->links()}}
                            </div>
                 

            </div>
                      
            </div>
         </div>
     </div>
</div>

@endsection