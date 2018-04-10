<body>
   <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        
        <a class="navbar-brand" href="#"><img  src="img/Logo_Stillus.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Sobre</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Serviços</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Contato</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">
          
          <h1 class="my-4" style="font-family: Alex Brush;">Stillus Bolsas</h1>
          <div class="list-group">
          <div  class="list-group-item list-group-item-action list-group-item-dark">
            CATEGORIAS 
          </div>
            @foreach($categorias as $categoria) 
            <a href="#" class="list-group-item list-group-item-action list-group-item-light">{{$categoria->nome}}</a>
            @endforeach
          </div>
              
        </div>
        
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        
         <ol class="carousel-indicators">
          @foreach( $banner as $banners )
             <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
          @endforeach
         </ol>
        
         <div class="carousel-inner" role="listbox">
           @foreach( $banner as $banners )
              <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                  <img class="d-block img-fluid" src="{{ $banners->imagem }}" alt="{{ $banners->nome }}">
                     
              </div>
           @endforeach
         </div>
         <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
           <span class="sr-only">Previous</span>
         </a>
         <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
           <span class="carousel-control-next-icon" aria-hidden="true"></span>
           <span class="sr-only">Next</span>
         </a>
       </div>

          <div class="row">
            @foreach($produto as $produtos)
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="{{ $produtos->url }} "alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">{{$produtos->nome}}</a>
                  </h4>
                  <h5>R${{$produtos->valor}}</h5>
                  <p class="card-text" id="text" >{{$produtos->descricao}}</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>
            @endforeach
        

          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

 <style>
    p {
      max-width: 190px; /* Tamanho */
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap
    }



    p {
      max-width: 300px; /* Tamanho */
      overflow: hidden;
      text-overflow: '... (continuar lendo)';
      white-space: nowrap
    }

    p:hover {
      text-overflow: clip;
      max-width: none
    }
</style>