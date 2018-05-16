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
                        <a type="button"  href="{{url('/admin/inventories')}}" class="btn btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</a>
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

                        <div class="row">
                            <div class="container">
                                <div class="col-lg-offset-1 col-lg-10">
                                    <div class="col-lg-10">
                                        <h2>Reabastecer&nbsp;&nbsp;{{ $articles->nombre_articulo }}</h2>
                                        <br>
                                        <form class="form-horizontal" method="post" action="{{ url('/admin/inventories/'.$articles->id.'/res') }}">
                                            {{ csrf_field() }}

                                            <div class="form-group">
                                                <div class="col-lg-6 hidden">
                                                    <label for="id" class="control-label">ID</label>
                                                    <input type="text" name="article_id" id="id" class="form-control" value="{{ $articles->id }}">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="nombre_articulo" class="control-label">Nombre Artículo</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                        </span>
                                                        <input type="text" name="nombre_articulo" id="nombre_articulo" class="form-control" value="{{ $articles->nombre_articulo }}"
                                                            disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-3">
                                                    <label for="min_stock" class="control-label">En inventario</label>
                                                    <h5>{{ $articles->cant }}</h5>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-3">
                                                    <label for="min_stock" class="control-label">Cantidad a abastecer</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                        </span>
                                                        <input type="text" name="cantidad" id="min_stock" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                         
                                            <div class="form-group hidden">
                                                <div class="col-lg-6">
                                                    <label for="fono" class="control-label">Valor de stock</label>
                                                    <input type="text" name="new_cant" class="form-control" id="fono" value="{{ $articles->cant }}">
                                                </div>
                                            </div>
                                          

                                            <div class="form-group">
                                                <div class="col-lg-9 pull-right">
                                                    <button type="submit" class="btn btn-success">Reabastecer</button>
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