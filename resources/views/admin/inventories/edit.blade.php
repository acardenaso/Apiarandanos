@extends('layouts.app') @section('content')
<!--Contenido-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Main content -->
  <section class="content">
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
              <div class="col-lg-offset-1 col-lg-10">
                <div class="col-lg-10">
                  <h2>Editar&nbsp;&nbsp;{{ $article->nombre_articulo }}</h2>
                  <br>
                  <form class="form-horizontal" method="post" action="{{ url('/admin/inventories/'.$article->id.'/edit') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <div class="col-lg-6">
                        <label for="nombre_articulo" class="control-label">Nombre Artículo</label>
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                          </span>
                          <input type="text" name="nombre_articulo" id="nombre_articulo" class="form-control" value=" {{ $article->nombre_articulo }}">
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <label for="descripcion" class="control-label">Descripción </label>
                        <textarea name="descripcion" id="descripcion" class="form-control">{{ $article->descripcion }}</textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-lg-6">
                        <label for="category_id" class="control-label">Categoría</label>
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                          </span>
                          <select data-live-search="true" class="form-control selectpicker" name="category_id" id="category_id">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if($category->id == old('category_id', $article->category_id)) selected @endif> {{ $category->categoria }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <label for="sub_category_id" class="control-label"> Sub Categoría</label>
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                          </span>
                          <select data-live-search="true" class="form-control selectpicker" name="sub_category_id" id="sub_category_id">
                              <option value=""></option>
                            @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}" @if($subcategory->id == old('sub_category_id', $article->sub_category_id)) selected @endif> {{ $subcategory->subcategoria }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-lg-6">
                        <label for="min_stock" class="control-label">Stock Mínimo </label>
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                          </span>
                          <input type="text" name="min_stock" id="min_stock" class="form-control" value=" {{ $article->min_stock }}">
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <label for="article_states_id" class="control-label">Estado</label>
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                          </span>
                          <select data-live-search="true" class="form-control selectpicker" name="article_state_id" id="article_state_id">
                            @foreach ($article_states as $article_state)
                            <option value="{{ $article_state->id }}" @if($article_state->id == old('article_state_id', $article->article_state_id)) selected @endif> {{ $article_state->estado
                              }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <br>

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
                

                    <div class="form-group">
                      <div class="col-lg-offset-9 col-lg-4">
                      <button type="submit" class="buttonna">Actualizar articulo <i class="fa fa-floppy-o"></i></button>
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