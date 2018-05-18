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
              <div class="col-lg-offset-1 col-lg-10">
                <div class="col-lg-10">
                  <h2>Nuevo Artículo</h2>
                </div>
                <br>
                
                <form class="form-horizontal" method="post" action="{{ url('/admin/inventories') }}">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <div class="col-lg-6">
                      <label for="nombre_articulo" class="control-label">Nombre Artículo</label>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                        </span>
                        <input type="text" name="nombre_articulo" id="nombre_articulo" class="form-control" value="{{old('nombre_articulo')}}" required>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <label for="descripcion" class="control-label">Descripción </label>
                      <textarea name="descripcion" id="descripcion" class="form-control" required>{{ old('descripcion') }}</textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-lg-4">
                      <label for="category_id" class="control-label">Categoría</label>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                        </span>
                        <select data-live-search="true" name="category_id" id="category_id" class="form-control selectpicker">
                          <option value="">Seleccione Categoria</option>
                          @foreach ($categories as $category)
                          <option value="{{ $category->id }}" @if(old('category_id') == $category->id) {{ 'selected' }} @endif> {{ $category->categoria }} </option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                     <div class="col-lg-4">
                      <label for="sub_category_id" class="control-label">Sub Categoría <i data-toggle="tooltip" title="Seleccione sub categoria solo para productos quimicos" class="fa fa-question-circle" aria-hidden="true"></i></label>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                        </span>
                        <select data-live-search="true" name="sub_category_id" id="sub_category_id" class="form-control selectpicker">
                          <option value="">Seleccione SubCategoria</option>
                          @foreach ($subcategories as $subcategory)
                          <option value="{{ $subcategory->id }}" @if(old('sub_category_id') == $subcategory->id) {{ 'selected' }} @endif> {{ $subcategory->subcategoria }} </option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-lg-4">
                      <label for="article_states_id" class="control-label">Estado</label>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                        </span>
                        <select data-live-search="true" name="article_state_id" id="article_state_id" class="form-control selectpicker">
                          <option value="">Seleccione Estado</option>
                          @foreach($article_states as $article_state)
                          <option value="{{ $article_state->id }}" @if(old('article_state_id') == $article_state->id) {{ 'selected' }} @endif> {{ $article_state->estado }} </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-lg-2">
                      <label for="min_stock" class="control-label">Stock Mínimo  <i data-toggle="tooltip" title="Genera una alerta si el stock es menor al numero ingresado" class="fa fa-question-circle" aria-hidden="true"></i></label>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i  class="fa fa-dot-circle-o" aria-hidden="true"></i>
                        </span>
                        <input type="text" name="min_stock" id="min_stock" class="form-control" value="{{old('min_stock')}}" required>
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <label for="min_stock" class="control-label">Inventario Inicial </label>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                        </span>
                        <input type="text" name="cantidad" id="min_stock" class="form-control"  value="{{old('cantidad')}}" required>
                      </div>
                    </div>

                    <div class="form-group hidden">
                      <div class="col-lg-2">
                        <label for="min_stock" class="control-label">User id </label>
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i  class="fa fa-dot-circle-o" aria-hidden="true"></i>
                          </span>
                          <input type="text" name="user_id" id="min_stock" class="form-control" value="{{ $user->id}}" required>
                        </div>
                      </div>
                    </div>
                    <br>

                    <div class="form-group">
                      <div class="col-lg-offset-9 col-lg-3">
                      <button type="submit" class="buttonna">Agregar Articulo <i class="fa fa-floppy-o"></i></button>
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