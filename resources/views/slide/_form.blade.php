

<div class="col-md-4 form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
<label for="nome">Nome</label>
<input type="text" name="nome" class="form-control" value="{{isset($slide->nome) ? $slide->nome : ''}}">
@if($errors->has('nome'))
    <span class="help-block">
        <strong>{{ $errors->first('nome') }}</strong>
    </span>
@endif
</div>
<div class="col-md-4 form-group {{ $errors->has('imagem') ? 'has-error' : '' }}">
<label for="imagem">imagem</label>

<input type="file" class="form-control"  name="imagem" class="form-control">

@if($errors->has('imagem'))
    <span class="help-block">
        <strong>{{ $errors->first('imagem') }}</strong>
    </span>
@endif
</div>    
<div class="col-md-12 form-group">
<label for="descricao">Descrição</label>
    <textarea class="descricao" id="descricao" name="descricao" rows="200" cols="200" value="{{isset($slide->descricao) ? $slide->descricao : ''}}">
        {{isset($slide->descricao) ? $slide->descricao : ''}}
</textarea> 
</div>
  