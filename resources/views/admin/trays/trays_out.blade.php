@extends('layouts.app') @section('content')
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
                <h2>Registro Bandejas Prestadas</h2>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-offset-1 col-lg-8">
                <form method="get" action="{{ url('/search') }}">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <button class="btn btn-default" type="submit">
                        <i class="fa fa-search"></i>
                      </button>
                    </div>
                    <input name="query" type="text" class="form-control" placeholder="Buscar Articulo">
                  </div>
                </form>
              </div>

            </div>
            <br>
            <div class="row">
              <div class="col-lg-offset-1 col-lg-10">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th >ID</th>
                      <th>Guia de despacho</th>
                      <th>Fecha</th>
                      <th>Artículo </th>
                      <th>Empresa</th>
                      <th>Bandejas prestadas</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody class="buscar">
                    @foreach ($operations as $operation)
                    <tr>
                      <td>{{ $operation->id }}</td>
                      <td>{{ $operation->folio }}</td>
                      <td>{{ $operation->fecha }}</td>
                      <td>{{ $operation->nombre_articulo }}</td>
                      <td>{{ $operation->nombre_berrie }}</td>
                      <td>{{ $operation->cantidad }}</td>
                      <td class="td-actions">
                      @can('trays.tray_out_view')
                        <a href="{{ url('/admin/trays/'.$operation->id.'/tray_out_view') }}" class="btn btn-xs btn-info">Detalle Guia &nbsp;&nbsp;<i class="fa fa-eye"></i></a>
                      @endcan
                      @can('trays.tray_return')
                        <a href="{{ url('/admin/trays/'.$operation->id.'/tray_return') }}" class="btn btn-xs btn-success">Registrar Devolución &nbsp;&nbsp;<i class="fa fa-search"></i></a>
                      @endcan
                      @can('trays.tray_out_edit')
                        <a href="{{ url('/admin/trays/'.$operation->id.'/tray_out_edit') }}" class="btn btn-xs btn-warning" data-toggle="tooltip" title="editar despacho">
                      @endcan  
                          <i class="fa fa-pencil"></i>
                                  </td>
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