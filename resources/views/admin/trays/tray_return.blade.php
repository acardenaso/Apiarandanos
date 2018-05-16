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
                        <a href="{{ url('/admin/trays_out') }}" class="btn btn-success"> Volver </a>
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

                                    <h2>Devolución de Bandejas</h2>
                                </div>

                                <br>

                                <form class="form-horizontal" method="post" action="{{ url('/admin/trays/trays_in') }}">

                                    {{ csrf_field() }}



                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            @if(Session::has('message'))
                                            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <div class="col-lg-6">
                                            <label for="id" class="control-label">Folio (N° Guia de despacho)*</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                </span>
                                                <input maxlength="5" type="text" name="folio" id="id" class="form-control" value="{{ $operations->folio}}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="fono" class="control-label">Cantidad de bandejas entregadas</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" class="form-control" id="cantidad" value="{{ $operations->cantidad}}" disabled>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label for="fono" class="control-label">Artículo</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" class="form-control" id="cantidad" value="{{ $operations->nombre_articulo}}" disabled>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <label for="berrie" class="control-label">Fecha en que se realizó el préstamo</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                </span>
                                                <input type="date" class="form-control" required value="{{ $operations->fecha}}" disabled>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="col-lg-4">
                                            <label for="fono" class="control-label">Cantidad de bandejas entregadas</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                            <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                            </span>
                                                <input type="text" name="cantidad" class="form-control" id="cantidad">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="berrie" class="control-label">Fecha en que se realizó la entrega</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                            </span>
                                                <input type="date" name="fecha" class="form-control" </div>
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <div class="col-lg-4">
                                                <label for="fono" class="control-label">Cantidad de bandejas entregadas</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                                                <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                                                </span>
                                                    <input type="text" name="cantidad" class="form-control" id="cantidad">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="berrie" class="control-label">Fecha en que se realizó la entrega</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                                                </span>
                                                    <input type="date" name="fecha" class="form-control" </div>
                                                </div>
                                            </div>

                                            <br>
                                            <div class="form-group">
                                                <div class="col-lg-offset-8 col-lg-4">
                                                    <button type="submit" class="btn btn-info">Guardar Devolución</button>                                                    &nbsp;

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