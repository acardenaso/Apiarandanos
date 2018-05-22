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
              <h1 style="border-bottom : 1px solid gray">Registro de Trabajadores</h1>
              </div>

                <br>
                <form class="form-horizontal" method="post" action="{{ url('/admin/workers') }}">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <div class="col-lg-6">
                      <label for="rut" class="control-label">Rut</label>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                        </span>
                        <input type="text" maxlength="12" name="rut" id="rut" class="form-control" onkeyup="this.value = formatterRut(this.value)"
                          required value="{{old('rut')}}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <label for="cargo" class="control-label">Localidad del Trabajador</label>
                      <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-dot-circle-o" aria-hidden="true"></i></span>
                      <select data-live-search="true" name="location_id" id="localidad" class="form-control selectpicker">
                        @foreach($locations as $location)
                        <option value="{{ $location->id }}" @if(old('location_id') == $location->id) {{ 'selected' }} @endif> {{ $location->localidad }} </option>
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
                        <input maxlength="30" type="text" name="nombre" id="nombres" class="form-control" required value="{{old('nombre')}}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <label for="apellidos" class="control-label">Apellidos</label>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                        </span>
                        <input maxlength="30" type="text" name="apellidos" class="form-control" id="apellidos" required value="{{old('apellidos')}}">
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
                        <input type="date" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento" required value="{{old('fecha_nacimiento')}}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <label for="direccion" class="control-label">Dirección</label>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                        </span>
                        <input maxlength="35" type="text" name="direccion" class="form-control" id="direccion" required value="{{old('direccion')}}">
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
                        <input type="text" maxlength="8" name="fono" class="form-control" id="fono" required value="{{old('fono')}}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <label for="cargo" class="control-label">Cargo del Trabajador</label>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                        </span>
                        <select data-live-search="true"  name="position_id" id="cargo" class="form-control selectpicker" >
                          @foreach($positions as $position)
                          <option value="{{ $position->id }}" @if(old('position_id') == $position->id) {{ 'selected' }} @endif>{{ $position->cargo }}  </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <label for="cargo" class="control-label">Nacionalidad del Trabjador</label>
                      <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-dot-circle-o" aria-hidden="true"></i></span>
                      <select data-live-search="true" name="nationality_id" id="nacionalidad" class="form-control selectpicker">
                        @foreach($nationalities as $nationality)
                        <option value="{{ $nationality->id }}" @if(old('nationality_id') == $nationality->id) {{ 'selected' }} @endif> {{ $nationality->nacionalidad }} </option>
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
                        <select data-live-search="true" name="state_id" id="estado" class="form-control selectpicker">
                          @foreach($states as $state)
                          <option value="{{ $state->id }}" @if(old('state_id') == $state->id) {{ 'selected' }} @endif> {{ $state->estado }} </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-6">
                      <label for="genero" class="control-label">Sexo</label>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                        </span>
                        <select  data-live-search="true" name="gender_id" id="genero" class="form-control selectpicker">
                          <option value="">Seleccione Sexo</option>
                          @foreach($genders as $gender)
                          <option value="{{ $gender->id }}"@if(old('gender_id') == $gender->id) {{ 'selected' }} @endif> {{ $gender->genero }} </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>


                  <br>
                  <div class="form-group">
                    <div class="col-lg-offset-9 col-lg-3">
                      <button type="submit" class="buttonna">Agregar Trabajador <i class="fa fa-floppy-o"></i></button>
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