@extends('layouts.app') @section('content')
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
            <a type="button" href="{{url('/admin/inventories')}}">
              <i class="fa fa-refresh" aria-hidden="true"></i>
            </a>&nbsp&nbsp&nbsp
            <b> Se encontraron {{ $articles->count() }} Resultados.</b>
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
              <div class="col-lg-6">
                <h2>Mantenedor de Artículos</h2>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-offset-1 col-lg-8">
                <form method="get" action="{{ url('/searcha') }}">
                  <div class="input-group">
                    @can('inventories.showa')
                    <div class="input-group-btn">
                      <button class="btn btn-default" type="submit">
                        <i class="fa fa-search"></i>
                      </button>
                    </div>
                    <input name="query" type="text" class="form-control" placeholder="Buscar Articulo">
                  </div>
                  @endcan
                   </div>
                </form>
              </div>
            </div><br>  
              <div class="row">
                <div class="col-lg-offset-1 col-lg-12">
                  @can('inventories.create')
                  <a class="buttonn" href="{{ url('/admin/inventories/create') }}" class="btn btn-success btn-sm">Nuevo Artículo&nbsp;&nbsp;
                    <i class="fa fa-plus"></i>
                  </a>

                  @endcan @can('inventories.gpdfa')
                  <a class="buttonn" target="_blanck" id="btnGenerarPdfI" class="btn btn-success btn-sm">Genenerar PDF&nbsp;&nbsp;
                    <i class="fa fa-file-pdf-o"></i>
                  </a>

                  <a class="buttonn" href="{{ route('articles.excel') }}" class="btn btn-success btn-sm">Genenerar Excel&nbsp;&nbsp;
                    <i class="fa fa-file-excel-o"></i>
                  </a>
                  @endcan
                </div>
              </div>
            
<br>
            <div class="row">
              <div class="col-lg-offset-1 col-lg-10">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th class="hidden">ID</th>
                      <th>Nombre </th>
                      <th>Descripción </th>
                      <th>Estado </th>
                      <th>Cantidad </th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody class="buscar">
                    @if(count($articles)>0) @foreach ($articles as $article)
                    <tr>
                      <td class="hidden">{{ $article->id }}</td>
                      <td class="nombre">{{ $article->nombre_articulo }}</td>
                      <td class="nombre">{{ $article->descripcion }}</td>
                      <td class="nombre">{{ $article->article_state_estado }}</td>
                      <td class="nombre">{{ $article->cant }}</td>
                      <td class="td-actions">
                        @can('inventories.re')
                        <a href="{{ url('/admin/inventories/'.$article->id.'/re') }}" class="buttonnd-sm" data-toggle="tooltip" title="reabastecer artículo">reabastecer&nbsp;
                          <i class="fa fa-plus"></i>
                        </a>
                        @endcan @can('inventories.edit')
                        <a href="{{ url('/admin/inventories/'.$article->id.'/edit') }}" class="buttonne-sm" data-toggle="tooltip" title="editar artículo">
                          <i class="fa fa-pencil"></i>
                        </a>
                        @endcan
                        <form style="display:inline-block;" method="post" action="{{ url('/admin/inventories/'.$article->id.'/delete') }}">
                          @can('inventories.destroy')
                          <button style="display:inline-block;" data-toggle="modal" data-target="#deleteI" class="buttonnde-sm" title="eliminar Articulo">
                            <i class="fa fa-trash"></i>
                          </button>
                          @endcan
                        </form>
                      </td>
                    </tr>
                  </tbody>
                  @endforeach
                   @else
                  <div style="position:absolute;visibility:visible z-index:1;top:-190px;left:722px;border-radius: 10px;opacity:0.8;" class="buttonn">
                  <i class="fa fa-exclamation"></i> No se encontraron resultados
                  </div>
                  @endif
                </table>
                {{ $articles->links() }}
              </div>

            </div>
          </div>
        </div>
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