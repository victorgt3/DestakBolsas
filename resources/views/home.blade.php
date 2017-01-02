@extends('template.temp')

@section('content')
<div class="container">
 <div>
    
    <h1 style="text-align: center;">Bem vindo!</h1>
            
    </div>
    <div class="row">
        <div class="col-md-12" style=" width: 96%;">
            <div class="panel panel-default">
               
                <!-- Main content -->
    
   
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>Produtos</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">Cadastrar <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Categorias</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-albums-outline"></i>
            </div>
            <a href="{{url('/categorias')}}" class="small-box-footer">Cadastrar <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>Fotos Produtos</p>
            </div>
            <div class="icon">
              <i class="ion ion-camera"></i>
            </div>
            <a href="#" class="small-box-footer">Cadastrar <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Marcas</p>
            </div>
            <div class="icon">
              <i class="ion ion-load-b"></i>
            </div>
            <a href="#" class="small-box-footer">Cadastrar <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
       

      </div>
      <!-- /.row -->
      <!-- Main row -->
     
          <!-- /.box -->

                        <!-- right col -->
                       
            </div>
         </div>
     </div>
</div>

@endsection