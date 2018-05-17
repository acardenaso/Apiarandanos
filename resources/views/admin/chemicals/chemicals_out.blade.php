@extends('layouts.app')

@section('content')
       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"></h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <div class="col-lg-offset-1 col-lg-10">
              <div class="col-lg-10">
                    <h2>Registro Salida de Productos</h2>
                    </div>
            </div>
            <div class="row">
              <div class="col-lg-offset-1 col-lg-8">
                <form method="get" action="{{ url('/searchqs') }}">
                  <div class="input-group">
                    <div class="input-group-btn">
                    @can('chemicals.showqs')
                      <button class="btn btn-default" type="submit">
                        <i class="fa fa-search"></i>
                      </button>
                    </div>
                    <input name="query" type="text" class="form-control" placeholder="Buscar registro de salida">
                    @endcan
                  </div>
                  <br>
                  @can('chemicals.gpdfqs')
                    <a class="buttonn" target="_blanck" id="btnGenerarPdfQS" class="btn btn-success">Genenerar PDF&nbsp;&nbsp;
                      <i class="fa fa-file-pdf-o"></i>
                    </a>
                    @endcan
                </form>
              </div>
             
            </div>
            <br>
                        <div class="row">
                        <div class="col-lg-offset-1 col-lg-10">
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th class="hidden">ID</th>
                                  <th>Fecha</th>
                                  <th>Artículo </th>
                                  <th>Sector</th>
                                  <th>Cantidad de salida</th>
                                </tr>
                              </thead>
                              <tbody class="buscar">
                                @foreach ($operations as $operation)
                                <tr>
                                  <td class="hidden">{{ $operation->id }}</td>
                                  <td>{{ $operation->fecha }}</td>
                                  <td>{{ $operation->nombre_articulo }}</td>
                                  <td>{{ $operation->descripcion }}</td>
                                  <td>{{ $operation->cantidad }}</td>
                                </tr>
                              </tbody>
                              
                                @endforeach 
                          </table>
            

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