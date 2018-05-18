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
            <a type="button"  href="{{url('/admin/trays_out')}}"><i class="fa fa-refresh" aria-hidden="true"></i></a>&nbsp&nbsp&nbsp
            <b> Se encontraron  {{ $operations->count() }} Resultados.</b>
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
                <form method="get" action="{{ url('/searchto') }}">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <button class="btn btn-default" type="submit">
                        <i class="fa fa-search"></i>
                      </button>
                    </div>
                    <input name="query" type="text" class="form-control" placeholder="Buscar Articulo">
                  </div><br>
                  
                        <a href="{{ url('admin/trays/tray_return') }}" class="buttonn">Registrar Devolución &nbsp;&nbsp;<i class="fa fa-plus"></i></a>
                   
                      <a href="" class="buttonn">Generar PDF &nbsp;&nbsp;<i class="fa fa-file-pdf-o"></i></a>
                      <a href="" class="buttonn">Generar Excel &nbsp;&nbsp;<i class="fa fa-file-excel-o"></i></a>   
                </form>
              </div>

            </div>
            <br>
            <div class="row">
              <div class="col-lg-offset-1 col-lg-10">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>N° de Guia</th>
                      <th>Fecha</th>
                      <th>Artículo </th>
                      <th>Empresa</th>
                      <th>Cantidad</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody class="buscar">
                    @foreach ($operations as $operation)
                    <tr>
                      <td class="hidden">{{ $operation->id }}</td>
                      <td>{{ $operation->folio }}</td>
                      <td>{{ $operation->fecha }}</td>
                      <td>{{ $operation->nombre_articulo }}</td>
                      <td>{{ $operation->nombre_berrie }}</td>
                      <td>{{ $operation->cantidad }}</td>
                      <td class="td-actions">
                      @can('trays.tray_out_view')
                        <a href="{{ url('/admin/trays/'.$operation->id.'/tray_out_view') }}" class="buttonnd-sm">Detalle Guia &nbsp;&nbsp;<i class="fa fa-eye"></i></a>
                      @endcan
                     
                      @can('trays.tray_out_edit')
                        <a href="{{ url('/admin/trays/'.$operation->id.'/tray_out_edit') }}" class="buttonne-sm" data-toggle="tooltip" title="editar despacho">
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