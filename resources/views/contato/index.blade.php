@extends('template.head')
@extends('template.footer')
<div id="teste">
<section class="section">
  <div class="container">
    <div class="well well-sm" >
      <h3><strong>Fale Conosco</strong></h3>
    </div>
	
	<div class="row">
	  <div class="col-md-7">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3751.219078644723!2d-43.942058585555245!3d-19.915170786612002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa699fc02ef94fd%3A0x7b87a082457ebfe6!2sDestak+Bolsas+Atacado+e+Varejo!5e0!3m2!1spt-BR!2sbr!4v1522854462062" width="100%" height="315" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>

      <div class="col-md-5">
          <h4><strong>Envie sua mensagem</strong></h4>
        <form action="/enviar" method="post">
        {{ csrf_field() }}
          <div class="form-group">
            <input type="text" class="form-control" name="nome" value="" placeholder="Nome">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" name="email" value="" placeholder="E-mail">
          </div>
          <div class="form-group">
            <input type="tel" class="form-control" name="telefone" value="" placeholder="Telefone">
          </div>
          <div class="form-group">
            <textarea class="form-control" name="mensagem" rows="3" placeholder="Mensagem"></textarea>
          </div>
          <button class="btn btn-info" type="submit" name="button">
              <i class="fa fa-paper-plane-o" aria-hidden="true"></i> Enviar
          </button>
        </form>
      </div>
    </div>
  </div>
</section>
</div>