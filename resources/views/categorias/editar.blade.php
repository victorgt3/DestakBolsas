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
                                                  
                    <form action="{{ route('categorias.update',$categorias->id) }}" method="post">
                        {{ csrf_field() }}
                         <input type="hidden" name="_method" value="put">
                         <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control" value="{{$categorias->nome}}">
                            @if($errors->has('nome'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nome') }}</strong>
                                </span>
                            @endif
                        </div>                       
                        <button class="btn btn-info">Atualizar</button>
                        
                    </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
  

