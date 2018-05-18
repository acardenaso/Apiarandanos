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
            <a type="button" href="{{url('/admin/trays_in')}}">
              <i class="fa fa-refresh" aria-hidden="true"></i>
            </a>&nbsp&nbsp&nbsp
      
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
              </button>

              <button class="btn btn-box-tool" data-widget="remove">
                <i class="fa fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="col-lg-offset-1 col-lg-10">
              <div class="col-lg-10">
                <h2>Préstamo de bandejas</h2>
              </div>
            </div>
            <div class="row">
            </div>
            <br>
            <div class="row">
              <div class="col-lg-offset-1 col-lg-10">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th class="hidden">ID</th>
                      <th>Tipo de bandeja</th>
                      <th>Cantidad disponible</th>
                      <th>Descripción</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody class="buscar">
                    @if(count($articles)>0) @foreach ($articles as $article)
                    <tr>
                      <td class="hidden">{{ $article->id }}</td>
                      <td>{{ $article->nombre_articulo }}</td>
                      <td>{{ $article->cant }}</td>
                      <td>{{ $article->descripcion }}</td>
                      <td class="td-actions">
                        @can('trays.tray_out')
                        <a href="{{ url('/admin/trays/'.$article->id.'/tray_out') }}" class="buttonn">Generar Préstamo &nbsp;&nbsp;
                          <i class="fa fa-clipboard"></i>
                        </a>
                        @endcan
                      </td>
                    </tr>
                  </tbody>
                  @endforeach @else
                  <div style="position:absolute;visibility:visible z-index:1;top:-220px;left:722px;border-radius: 10px;opacity:0.8;" class="alert alert-warning">
                    No se encontraron resultados!
                  </div>
                  @endif
                </table>


              </div>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!--Fin-Contenido-->
@endsection