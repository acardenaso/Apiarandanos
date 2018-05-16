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
                  <a type="button"  href="{{url('/admin/workers')}}" class="btn btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</a>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                <div class="row">
                  <div style="border-radius: 25px;border: 2px solid  #8080ff;" class="col-lg-offset-1 col-lg-10">
                    <h2 style="border-bottom : 2px solid gray">Detalle del trabajador</h2>
                    <br>
                
                    <form class="form-horizontal">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="col-lg-6">
                                        <label for="rut" class="control-label">Rut</label><br>
                                        <h4>{{ $worker->rut }} </h4>
                                    </div>
                                    </div>  
                                    
                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            <label for="nombres" class="control-label">Nombres </label>
                                            <h4>{{ $worker->nombre }}</h4>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="apellidos" class="control-label">Apellidos </label>
                                            <h4>{{ $worker->apellidos }}</h4>
                                        </div>    
                                    </div>  
                                    
                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            <label for="fecha_nacimiento" class="control-label">Fecha de Nacimiento</label>
                                            <h4>{{ $worker->fecha_nacimiento }}</h4>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="direccion" class="control-label">Dirección</label>
                                            <h4>{{ $worker->direccion }}</h4>
                                        </div>      
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            <label for="fono" class="control-label">Teléfono</label>
                                            <h4>{{ $worker->fono }}</h4>
                                        </div>
                                            <div class="col-lg-6">
                                              <label for="fono" class="control-label">Cargo</label>
                                              <h4>{{ $worker->position_cargo }}</h4>
                                          </div>     
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-lg-6">
                                          <label for="fono" class="control-label">Nacionalidad del Trabajador</label>
                                          <h4>{{ $worker->nationality_nacionalidad }}</h4>
                                        </div> 
                                        <div class="col-lg-6">
                                          <label for="fono" class="control-label">Estado del Trabajador</label>
                                          <h4>{{ $worker->state_estado }}</h4>
                                        </div>
                                      </div>
                                    
                                    <div class="form-group">
                                      <div class="col-lg-6">
                                        <label for="fono" class="control-label">Sexo</label>
                                        <h4>{{ $worker->gender_genero }}</h4>
                                      </div>
                                      <div class="col-lg-6">
                                        <label for="localidad" class="control-label">Localidad</label>
                                        <h4>{{ $worker->location_localidad }}</h4>
                                      </div>
                                        
                                    </div>
                                    <div class="form-group">
                                     
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