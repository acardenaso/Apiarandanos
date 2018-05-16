@extends('layouts.app')

@section('content')
       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-lg-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"></h3>
                  <a type="button"  href="{{url('/admin/berries')}}" class="btn btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</a>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                <div class="row">
                <div class="col-lg-offset-1 col-lg-10">
                <div class="col-lg-8">
                    <h2>Modificar datos de Berries</h2>
                    </div>
                    <br>


                <form class="form-horizontal" method="post" action="{{ url('/admin/berries/'.$berrie->id.'/edit') }}">
                    {{ csrf_field() }}
               <div class="form-group">
                <div class="col-lg-6">
                  <label for="nombre_berrie" class="control-label">Nombre Empresa</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" name="nombre_berrie" id= "nombre_berrie"placeholder="Nombre" value="{{ $berrie->nombre_berrie }}">
                </div>
                  </div> 
                  <div class="col-lg-6">
                  <label for="direccion" class="control-label">Direccion Empresa</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                    <input type="text" class="form-control" name="direccion" id= "direccion" placeholder="Direccion" value="{{ $berrie->direccion }}">
                </div>
                  </div> 
                </div> 

                <div class="form-group">

                <div class="col-lg-6">
                  <label for="representante" class="control-label">Representante</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
                    <input  type="text" class="form-control" name="representante" id= "representante" placeholder="Nombre Representante" value="{{ $berrie->representante }}">
                </div>
                  </div> 

                  <div class="col-lg-6">
                  <label for="rut_empresa" class="control-label">Rut Empresa</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-toggle-right"></i></span>
                    <input  type="text" class="form-control" name="rut_empresa" id="rut_empresa" placeholder="Rut" value="{{ $berrie->rut_empresa }}">
                  </div>
                  </div> 

                </div> 

                <div class="form-group">
                <div class="col-lg-6">
                  <label for="fono" class="control-label">Telefono</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input type="text" class="form-control" name="fono" id="fono" placeholder="Telefono" value="{{ $berrie->fono }}">
                </div>
                  </div> 
                </div>   
                
                  

                </div>
                <br>
                <div class="form-group">
                  <div class="col-lg-offset-1 col-lg-2">
                    <button type="submit" class="btn btn-success">Actualizar Datos de Empresa</button>
                  </div>
                </div>
             

                </form>

                  </div>
                </div>
 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->




      
@endsection