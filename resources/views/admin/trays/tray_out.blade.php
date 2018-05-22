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
                        <a type="button"  href="{{url('/admin/trays_in')}}" class="btn btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</a>
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
                                    <div class="col-lg-offset-8 col-lg-12">
                                    @if($articles->min_stock >= $articles->cant)
                                        <h3 class="rojo">Disponible: {{ $articles->cant }} unidades stock critico!</h3>
                                    @else
                                    <h3>Disponible: {{ $articles->cant }} unidades</h3>
                                    @endif
                                    </div>
                                    <h2 style="border-bottom : 1px solid gray">Préstamo de Bandejas</h2>
                                </div>

                                <br>

                                <form class="form-horizontal" method="post" action="{{ url('/admin/trays/'.$articles->id.'/tray_out') }}">

                                    {{ csrf_field() }}
                                    
                                        
                               
                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            @if(Session::has('message'))
                                            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                                            @endif   
                                        </div> 
                                    </div>

                                    <div class="form-group">

                                        <div class="col-lg-4">
                                            <label for="id" class="control-label">Folio (N° Guia de despacho)*</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                </span>
                                                <input maxlength="5" type="text" name="folio" id="id" class="form-control" required value="{{old('folio')}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="fono" class="control-label">Cantidad de bandejas solicitadas</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" name="cantidad" class="form-control" id="cantidad" required value="{{old('cantidad')}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <h4>
                                                <label for="nombres" class="control-label">Tipo de bandeja</label>
                                            </h4>
                                            <h4> {{ $articles->nombre_articulo }} </h4>
                                        </div>

                                        <div class="col-lg-4">
                                            <label for="berrie" class="control-label">Fecha de solicitud</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                </span>
                                                <input type="date" name="fecha" class="form-control" required value="{{old('fecha')}}">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label for="berrie" class="control-label">Huerto solicitante</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                </span>
                                                <select data-live-search="true" class="form-control selectpicker" name="berrie_id" id="berrie">
                                                    <option value="">Seleccione Huerto destino:</option>
                                                    @foreach ($berries as $berrie)
                                                    <option value="{{ $berrie->id }}" @if(old('berrie_id') == $berrie->id) {{ 'selected' }} @endif> {{ $berrie->nombre_berrie }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-4">
                                                <label for="berrie" class="control-label">Descripción</label>
                                                <textarea name="description" class="form-control" required>{{ old('description') }}solo traslado</textarea>
                                            </div>
                                            
                                           
                                        </div>
                                        <div class="form-group">
                                        <div class="col-lg-6">
                 
                                                <input type="text" name="article_id" id="id" class="form-control hidden" value=" {{ $articles->id }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="worker" class="control-label">Responsable</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                </span>
                                                <select data-live-search="true" class="form-control selectpicker" name="worker_id" id="worker">
                                                    <option value="">Seleccione Responsable:</option>
                                                    @foreach ($workers as $worker)
                                                    <option value="{{ $worker->id }}" @if(old('worker_id') == $worker->id) {{ 'selected' }} @endif> {{ $worker->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-5 col-lg-4">
                                        <button type="submit" class="buttonna">Generar prestamo <i class="fa fa-floppy-o"></i></button>

                                        </div>
                                    </div>

                                    <div class="form-group hidden">
                                        <div class="col-lg-6">
                                            <label for="fono" class="control-label">Cantidad de bandejas solicitadas</label>
                                            <input type="text" name="new_cant" class="form-control" id="new_cant" value="{{ $articles->cant }}">
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