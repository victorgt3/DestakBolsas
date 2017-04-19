@extends('template.temp')
 <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

@section('content')
<div class="container">
	<div>
         <h1 style="text-align: center;">Produtos</h1>
    </div>
    <div class="row">
        <div class="col-md-12" style="width: 96%;">
            <div class="panel panel-default">                
                <ol class="breadcrumb panel-heading">
                    <li><a href="{{url('/home')}}">Home</a></li>
                    <li class="active">Produtos</li>
                </ol>

                <div class="panel-body">
                                                  
                    <form action="#" method="post">
                        {{ csrf_field() }}
                         <div class="col-md-4 form-group {{ $errors->has('categoria') ? 'has-error' : '' }}">
                            <label for="categoria">Categoria</label>
                            <select id="categoria" class="form-control" name="categoria">
                                <option></option>
                            </select>
                          @if($errors->has('categoria'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('categoria') }}</strong>
                                </span>
                            @endif
                        </div> 
                        <div class="col-md-4 form-group {{ $errors->has('marca') ? 'has-error' : '' }}">
                            <label for="marca">Marca</label>
                            <select id="marca" class="form-control" name="marca">
                                <option></option>
                            </select>
                          @if($errors->has('marca'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('marca') }}</strong>
                                </span>
                            @endif
                        </div>         
                         
                         <div class="col-md-4 form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control">
                            @if($errors->has('nome'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nome') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-4 form-group {{ $errors->has('ativo') ? 'has-error' : '' }}">
                            <label for="ativo">Ativo</label>
                            <select id="ativo" class="form-control" name="ativo">
                                <option>Sim</option>
                                <option>Não</option>
                            </select>
                          @if($errors->has('ativo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ativo') }}</strong>
                                </span>
                            @endif
                        </div>
                         <div class="col-md-4 form-group {{ $errors->has('descrição') ? 'has-error' : '' }}">
                            <label for="valor">Valor</label>
                            <input type="text" name="valor" class="form-control">
                            @if($errors->has('valor'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('valor') }}</strong>
                                </span>
                            @endif
                        </div>    
                        <br><br><br><br><br><br><br>
                         <div class="box-body pad">
                            <label for="descricao">Descrição</label>
                             <textarea id="editor1" name="editor1" rows="200" cols="100">
                                    Escreva aqui sua descrição sobre o produto.
                            </textarea> 
                        </div>                      
                        <button class="btn btn-info">Salvar</button>
                        
                    </form>
                
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>

