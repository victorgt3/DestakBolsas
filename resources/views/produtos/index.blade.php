@extends('template.temp')

@section('content')
<div class="container">
	<div>
         <h1 style="text-align: center;">Produtos</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">                
                <ol class="breadcrumb panel-heading">
                    <li><a href="{{url('/home')}}">Home</a></li>
                    <li class="active">Produtos</li>
                </ol>

                <div class="panel-body">
                                                  
                    <form action="#" method="post">
                        {{ csrf_field() }}
                         
                         <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control">
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
</div>
@endsection
  

