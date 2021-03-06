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
                    <li class="active">Cadastro de Banner</li>
                </ol>
                <div class="panel-body">
                    <form id="idform" action="{{route('banners.save')}}" method="post" enctype="multipart/form-data">
                             {{ csrf_field() }}
                             @include('banner._form') 
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
<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- CK Editor -->
<script src="../../plugins/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="descricao"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('descricao');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>

