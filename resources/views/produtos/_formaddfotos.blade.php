

<div class="col-md-4 form-group {{ $errors->has('imagens') ? 'has-error' : '' }}">
<label for="imagens">Imagens</label>
<input type="file" class="form-control" multiple name="imagens[]" class="form-control">

@if($errors->has('imagens'))
    <span class="help-block">
        <strong>{{ $errors->first('imagens') }}</strong>
    </span>
@endif
</div>    

  
               
                 
                