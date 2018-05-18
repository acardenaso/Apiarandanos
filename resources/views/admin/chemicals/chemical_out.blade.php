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
                        <a type="button"  href="{{url('/admin/chemicals_in')}}" class="btn btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</a>
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
                    @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                  </ul>
                </div>
                @endif
                        <div class="row">
                            <div class="col-lg-offset-1 col-lg-10">
                                <div class="col-lg-10">
                                    <h2>Salida de productos</h2>
                                </div>
                                <br>
                                <form class="form-horizontal" method="post" action="{{ url('/admin/chemicals/'.$articles->id.'/chemicalout') }}">

                                    {{ csrf_field() }}

                                    <div class="form-group hidden">
                                        <div class="col-lg-6">
                                            <label for="id" class="control-label">ID Producto quimico *</label>
                                            <input type="text" name="article_id" id="id" class="form-control" value=" {{ $articles->id }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            <label for="nombres" class="control-label">Nombre del producto</label>
                                            <h4> {{ $articles->nombre_articulo }} </h4>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="fono" class="control-label">Cantidad disponible</label>
                                            <h4>{{ $articles->cant }}</h4>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            <label for="fono" class="control-label">Cantidad de salida</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" name="cantidad" class="form-control" id="fono" required value="{{ old('cantidad') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="berrie" class="control-label">Sector</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" name="sector" class="form-control" required value="{{ old('sector') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            <label for="berrie" class="control-label">Fecha salida</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                </span>
                                                <input type="date" name="fecha" class="form-control" required value="{{ old('fecha') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="form-group">
                                        <div class="col-lg-offset-8 col-lg-4">
                                            <button type="submit" class="btn btn-info">Registrar salida</button>


                                        </div>
                                    </div>

                                    <div class="form-group hidden">
                                        <div class="col-lg-6">
                                            <label for="fono" class="control-label">Cantidad de bandejas solicitadas</label>
                                            <input type="text" name="new_cant" class="form-control" id="fono" value="{{ $articles->cant }}">
                                        </div>
                                    </div>

                                </form>

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