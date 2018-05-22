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
                        <a type="button"  href="{{url('/admin/workers')}}" class="btn btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</a>
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
                        <div class="col-lg-8">        
                                <h2 style="border-bottom : 1px solid gray">Editar información del trabajador</h2>
                                </div>
                               
                                <br>
                                <form class="form-horizontal" method="post" action="{{ url('/admin/workers/'.$worker->id.'/edit') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            <label for="rut" class="control-label">Rut</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" name="rut" id="rut" class="form-control" placeholder="Rut Trabajador" value=" {{ $worker->rut }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="localidad" class="control-label">Localidad</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                </span>
                                                <select class="form-control selectpicker" data-live-search="true" name="location_id" id="location_id">
                                                    <option value="">Seleccione localidad</option>
                                                    @foreach ($locations as $location)
                                                    <option value="{{ $location->id }}" @if($location->id == old('location_id', $worker->location_id)) selected @endif> {{ $location->localidad}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            <label for="nombres" class="control-label">Nombres</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" name="nombre" id="nombres" class="form-control" value=" {{ $worker->nombre }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="apellidos" class="control-label">Apellidos</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" name="apellidos" class="form-control" id="apellidos" value=" {{ $worker->apellidos }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            <label for="fecha_nacimiento" class="control-label">Fecha de Nacimiento</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento" value=" {{ $worker->fecha_nacimiento }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="direccion" class="control-label">Dirección</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" name="direccion" class="form-control" id="direccion" value=" {{ $worker->direccion }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            <label for="fono" class="control-label">Teléfono</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" name="fono" class="form-control" id="fono" value=" {{ $worker->fono }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="fono" class="control-label">Cargo</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                </span>
                                                <select class="form-control selectpicker" data-live-search="true" name="position_id" id="position_id">
                                                    <option value="">General</option>
                                                    @foreach ($positions as $position)
                                                    <option value="{{ $position->id }}" @if($position->id == old('position_id', $worker->position_id)) selected @endif> {{ $position->cargo
                                                        }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            <label for="cargo" class="control-label">Nacionalidad del Trabjador</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                </span>
                                                <select name="nationality_id" data-live-search="true" id="nacionalidad" class="form-control selectpicker">
                                                    <option value="">General</option>
                                                    @foreach ($nationalities as $nationality)
                                                    <option value="{{ $nationality->id }}" @if($nationality->id == old('nationality_id', $worker->nationality_id)) selected @endif>
                                                        {{ $nationality->nacionalidad }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="cargo" class="control-label">Estado del Trabjador</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                </span>
                                                <select name="state_id" data-live-search="true" id="estado" class="form-control selectpicker">
                                                    <option value="">General</option>
                                                    @foreach ($states as $state)
                                                    <option value="{{ $state->id }}" @if($state->id == old('state_id', $worker->state_id)) selected @endif> {{ $state->estado
                                                        }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            <label for="sexo" class="control-label">Sexo</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                </span>
                                                <select class="form-control selectpicker" data-live-search="true" name="gender_id" id="gender_id">
                                                    <option value="">Sexo</option>
                                                    @foreach ($genders as $gender)
                                                    <option value="{{ $gender->id }}" @if($gender->id == old('gender_id', $worker->gender_id)) selected @endif> {{ $gender->genero
                                                        }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="fono" class="control-label">Teléfono</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" name="fono" class="form-control" id="fono" value=" {{ $worker->fono }}">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-lg-offset-9 col-lg-4">
                                        <button type="submit" class="buttonna">Actualizar Trabajador <i class="fa fa-floppy-o"></i></button>
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