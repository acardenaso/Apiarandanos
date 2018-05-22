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
                            <div class="container">
                                <div class="col-lg-offset-1 col-lg-10">
                                    <div class="col-lg-10">
                                        <h2 style="border-bottom : 1px solid gray">Reabastecer:&nbsp;{{ $articles->nombre_articulo }}</h2>
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
                                                        <h3>{{ $articles->nombre_articulo }}</h3>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-3">
                                                    <label for="min_stock" class="control-label">En inventario</label>
                                                    <h3>{{ $articles->cant }}</h3>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-3">
                                                    <label for="min_stock" class="control-label">Cantidad a abastecer</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                        </span>
                                                        <input maxlength="5" type="text" name="cantidad" id="min_stock" class="form-control" required>
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
                                                <button type="submit" class="buttonna">Reabastecer articulo <i class="fa fa-floppy-o"></i></button>
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