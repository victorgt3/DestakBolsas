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
                    <li><a href="{{url('/home')}}">Home</a></li>
                    <li class="active">Cadastro de produto</li>
                </ol>
                <div class="panel-body">
                    <form id="idform" action="{{route('produtos.update',$produto->id)}}" method="post" enctype="multipart/form-data">
                             {{ csrf_field() }}
                             @include('produtos._formedit')
                      <div class="col-md-12 form-group">       
                        <img id="Carregando" style=" display: none; " width="20" src="images/fluid_dg_skins-loader.gif" />
                            <div id="array" style="display: none;" >Carregando...</div>
                            <div id="carregar" > 
                                <button type="button" onclick="enviaform()" class="btn btn-info" >Atulizar</button>   
                        </div> 
                    </form> 
                    </div>                                              
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="panel panel-default"> 
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Imagem</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                @foreach($imagem as $foto) 
                <tbody>
                    <tr>
                        <th>{{$foto->ordem}}</th>
                        <td><img height="80" src="{{asset($foto->url)}}"  /></td>                                
                        <td>
                            <a class="btn btn-danger" href="javascript:(confirm('Deseja deletar esse registro?') ? window.location.href='{{route('fotoprodutos.destroy',$foto->id)}}' : FALSE)">Deletar</a>
                        </td>
                    </tr>                            
                </tbody>
                    @endforeach 
            </table>
                <div align="center">
                    {{$imagem->links()}}      
                 </div>
        </div>
    </div>
 </div>
  
@endsection
<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- CK Editor -->
<script src="../../plugins/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('descricao');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>

