

<div class="col-md-4 form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
<label for="nome">Nome</label>
<input type="text" name="nome" class="form-control" value="{{isset($banner->nome) ? $banner->nome : ''}}">
@if($errors->has('nome'))
    <span class="help-block">
        <strong>{{ $errors->first('nome') }}</strong>
    </span>
@endif
</div>
<div class="col-md-4 form-group {{ $errors->has('imagens') ? 'has-error' : '' }}">
<label for="imagens">Imagens</label>

<input type="file" class="form-control" multiple name="imagens[]" class="form-control">

@if($errors->has('imagens'))
    <span class="help-block">
        <strong>{{ $errors->first('imagens') }}</strong>
    </span>
@endif
</div>    
<div class="col-md-12 form-group">
<label for="descricao">Descrição</label>
    <textarea class="descricao" id="descricao" name="descricao" rows="200" cols="200" value="{{isset($banner->descricao) ? $banner->descricao : ''}}">
        {{isset($banner->descricao) ? $banner->descricao : ''}}
</textarea> 
</div>
  
               
                 
                