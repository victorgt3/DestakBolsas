@extends('template.temp')

@section('content')
<script>
     function enviaform()
     {
        $("#carregar").empty();
        $("#Carregando").show();
        $("#array").show();
        $("#idform").submit();
     }
</script>
<div class="container">
	<div>
         <h1 style="text-align: center;">Marcas</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">                
                <ol class="breadcrumb panel-heading">
                    <li><a href="{{url('/home')}}">Home</a></li>
                    <li class="active">Marcas</li>
                </ol>

                <div class="panel-body">                                    
                    <form id="idform" action="{{ route('marcas.store') }}" method="post">
                        {{ csrf_field() }}
                         <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control" placeholder="Nome da marca">
                            @if($errors->has('nome'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nome') }}</strong>
                                </span>
                            @endif
                        </div>                       
                        <img id="Carregando" style=" display: none; " width="20" src="images/fluid_dg_skins-loader.gif" />
                            <div id="array" style="display: none;" >Carregando...</div>
                            <div id="carregar" > 
                                <button type="button" onclick="enviaform()" class="btn btn-info" >Salvar</button>   
                        </div>
                        
                    </form>
                    

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
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
                         @foreach($marcas as $marca)  
                        <tbody>
                           

                            <tr>
                                <th>{{$marca->id}}</th>
                                <td>{{$marca->nome}}</td>
                                <td>
                             
                                    <a class="btn btn-default" href="{{route('marcas.edit',$marca->id)}}">Editar</a>
                                    <a class="btn btn-danger" href="javascript:(confirm('Deseja deletar esse registro?') ? window.location.href='{{route('marcas.destroy',$marca->id)}}' : FALSE)">Deletar</a>
                            
                                </td>
                            </tr>                            

                         
                            
                        </tbody>

                         @endforeach   
                        
                             
                       
                    </table>
                   
                            <div align="center">
                                {{$marcas->links()}}
                            </div>
                 

            </div>
                   
            </div>
         </div>
     </div>
</div>

@endsection