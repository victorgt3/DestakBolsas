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
    <div class="row">
        <div class="col-md-12" style="width: 96%;">
            <div class="panel panel-default">                
                <ol class="breadcrumb panel-heading">
                    <li><a href="{{url('/listaprodutos')}}">Lista de produtos</a></li>
                    <li class="active">Cadastro de imagens</li>
                </ol>
                <div class="panel-body">
                    <form id="idform" action="{{route('produtos.salvarFotos',$produtos->id)}}" method="post" enctype="multipart/form-data">
                             {{ csrf_field() }}
                             @include('produtos._formaddfotos') 
                      <div class="col-md-12 form-group">       
                        <img id="Carregando" style=" display: none; " width="20" src="images/fluid_dg_skins-loader.gif" />
                            <div id="array" style="display: none;" >Carregando...</div>
                            <div id="carregar" > 
                                <button type="button" onclick="enviaform()" class="btn btn-success" >Salvar</button>   
                        </div> 
                     </div>                     
                    </form>                             
                </div>
            </div>
        </div>
    </div>
</div>
@endsection