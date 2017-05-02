
<div class="col-md-4 form-group {{ $errors->has('categorias') ? 'has-error' : '' }}">
<label for="categorias">Categoria</label>
<select id="categorias" class="form-control" name="categorias">
<option value="">Selecione uma categoria</option>
@foreach($categorias as $categoria)
    <option value="{{ $categoria->id}}"{{( isset($produto->categorias_id) && $produto->categorias_id == $categoria->id ? 'selected' : ''  )}} >
    {{ $categoria->nome}}
    </option>
@endforeach    
</select>
@if($errors->has('categoria'))
    <span class="help-block">
        <strong>{{ $errors->first('categoria') }}</strong>
    </span>
@endif
</div> 
<div class="col-md-4 form-group {{ $errors->has('marcas') ? 'has-error' : '' }}">
<label for="marcas">Marca</label>
<select id="marcas" class="form-control" name="marcas">
   <option value="">Selecione uma marca</option>
    @foreach($marcas as $marca)
    <option value="{{ $marca->id}}"{{( isset($produto->marcas_id) && $produto->marcas_id == $marca->id ? 'selected' : ''  )}} >
    {{ $marca->nome}}
    </option>
@endforeach  
</select>
@if($errors->has('marcas'))
    <span class="help-block">
        <strong>{{ $errors->first('marca') }}</strong>
    </span>
@endif
</div>         

<div class="col-md-4 form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
<label for="nome">Nome</label>
<input type="text" name="nome" class="form-control" value="{{isset($produto->nome) ? $produto->nome : ''}}">
@if($errors->has('nome'))
    <span class="help-block">
        <strong>{{ $errors->first('nome') }}</strong>
    </span>
@endif
</div>
<div class="col-md-4 form-group {{ $errors->has('ativo') ? 'has-error' : '' }}">
<label for="ativo">Ativo</label>
<select id="ativo" class="form-control" name="ativo">
    <option value="N" {{(isset($produto->ativo) && $produto->ativo == 'N' ? 'selected' : '' )}}>Não</option>
    <option value="S"{{(isset($produto->ativo) && $produto->ativo == 'S' ? 'selected' : '' )}}>Sim</option>
</select>
@if($errors->has('ativo'))
    <span class="help-block">
        <strong>{{ $errors->first('ativo') }}</strong>
    </span>
@endif
</div>
<div class="col-md-4 form-group {{ $errors->has('valor') ? 'has-error' : '' }}">
<label for="valor">Valor (ex:5.90)</label>
<input type="number" step="any" name="valor" class="form-control" value="{{isset($produto->valor) ? $produto->valor : ''}}">
@if($errors->has('valor'))
    <span class="help-block">
        <strong>{{ $errors->first('valor') }}</strong>
    </span>
@endif
</div>    
<br><br><br><br><br><br><br>
<div class="box-body pad">
<label for="descricao">Descrição</label>
    <textarea id="descricao" name="descricao" rows="200" cols="100" value="{{isset($produto->descricao) ? $produto->descricao : ''}}">
        {{isset($produto->descricao) ? $produto->descricao : ''}}
</textarea> 
</div>
@if(isset($produto->imagem))
<img height="60" src="{{asset($produto->imagem)}}"  />
@endif
<div class="col-md-6 form-group {{ $errors->has('imagens') ? 'has-error' : '' }}">
<label for="imagens">Imagens</label>
<<<<<<< HEAD
<input type="file" class="form-control" multiple name="imagens[]" class="form-control">
=======
<input type="file"  class="form-control" multiple name="imagens[]" class="form-control">
>>>>>>> e659207a7720f8a3c41decf819242580d5abaf5b
@if($errors->has('imagens'))
    <span class="help-block">
        <strong>{{ $errors->first('imagens') }}</strong>
    </span>
@endif
</div>  
<br><br><br><br><br>                      
                   
                