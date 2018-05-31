@extends('layouts.app') @section('content')


<style type="text/css">


.select-field{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    border: 1px solid #C2C2C2;
    box-shadow: 5px 5px 8px #EBEBEB;
    -moz-box-shadow: 1px 1px 4px #EBEBEB;
    -webkit-box-shadow: 1px 1px 4px #EBEBEB;
    border-radius: 3px;
    -webkit-border-radius: 7px;
    -moz-border-radius: 3px;
    padding: 7px;
    outline: none;
    width:225px;
}

.select-field-guia{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    border: 1px solid #C2C2C2;
    box-shadow: 5px 5px 8px #EBEBEB;
    -moz-box-shadow: 1px 1px 4px #EBEBEB;
    -webkit-box-shadow: 1px 1px 4px #EBEBEB;
    border-radius: 3px;
    -webkit-border-radius: 7px;
    -moz-border-radius: 3px;
    padding: 7px;
    outline: none;
    width:90px;
}
.select-field:focus{
    border: 1px solid #0C0;
}

.select-field-guia:focus{
    border: 1px solid #0C0;
}

</style>




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
              <div class="col-sm-offset-1 col-sm-10">
                <div class="row">  
                  <div class="col-sm-10">
                    <h2 style="border-bottom : 1px solid gray">Nuevo Artículo</h2>
                  </div>
                </div>

                <form class="form-horizontal" method="post" action="{{ url('/admin/inventories') }}">
                  {{ csrf_field() }}
                  
                  <div class="row">
                    <div class="col-sm-2">
                        <label for="guia" class="control-label">N° Guia</label>
                      <div class="input-group">
                        <input maxlength="7" type="text" name="guia" id="guia" class="select-field-guia"  value="{{old('guia')}}" required>
                      </div>
                    </div>

                

                    <div class="col-sm-2">
                        <label for="min_stock" class="control-label">Stock Mínimo  <i data-toggle="tooltip" title="Genera una alerta si el stock es menor o igual al inventario inicial" class="fa fa-question-circle" aria-hidden="true"></i></label>
                      <div class="input-group">
                        <input maxlength="5" type="text" name="min_stock" id="min_stock" class="select-field-guia" value="{{old('min_stock')}}" required>
                      </div>
                    </div>

                    <div class="col-sm-2">
                        <label for="min_stock" class="control-label">Stock Inicial </label>
                      <div class="input-group">
                        <input maxlength="5" type="text" name="cantidad" id="min_stock" class="select-field-guia"  value="{{old('cantidad')}}" required>
                      </div>
                    </div>

                    <div id="sagg" class="col-sm-2 hidden">
                        <label for="sag" class="control-label">N° Sag </label>
                      <div class="input-group">
                        <input  maxlength="5" type="text" name="sag" id="sag" class="select-field-guia"  value="{{old('sag')}}">
                      </div>
                    </div>

                  <div id="reingresoo" class="col-sm hidden">
                        <label for="reingreso" class="control-label">Periodo de reingreso</label>
                      <div class="input-group">
                        <input maxlength="7" type="text" name="reingreso" id="guia" class="select-field"  value="{{old('reingreso')}}">
                      </div>
                  </div>

                  </div>
                    
                  <div class="row">
                    <div class="col-lg-3">
                        <label for="fecha" class="control-label">Fecha</label>
                      <div class="input-group">
                        <input type="date" name="fecha" id="fecha" class="select-field"  value="{{old('fecha')}}" required>
                      </div>
                    </div>

                    <div class="col-lg-3">
                        <label for="nombre_articulo" class="control-label">Nombre Artículo</label>
                      <div class="input-group">
                        <input maxlength="30" type="text" name="nombre_articulo" id="nombre_articulo" class="select-field" value="{{old('nombre_articulo')}}" required>
                      </div>
                    </div>

                    <div class="col-lg-3">
                        <label for="descripcion" class="control-label">Descripción </label>
                      <div class="input-group">
                        <input maxlength="35" name="descripcion" id="descripcion" class="select-field"  value="{{old('descripcion')}}" required>
                      </div>
                    </div>

                    

                    <div class="col-sm-3">  
                        <label class="control-label"></label>
                      <div class="input-group">
                      </div>
                    </div>
                  </div>

                  
                  <div class="col-sm-3">  
                      <label for="category_id" class="control-label">Categoría</label>
                      <div class="input-group">
                        <select  name="category_id" id="category" class="selectpicker">
                          <option value="0">Seleccione Categoria</option>
                          @foreach ($categories as $category)
                          <option value="{{ $category->id }}" @if(old('category_id') == $category->id) {{ 'selected' }} @endif> {{ $category->categoria }} </option>
                          @endforeach
                        </select>
                      </div>
                  </div>

                  <div class="col-sm-3"> 
                      <label for="article_states_id" class="control-label">Estado</label>
                      <div class="input-group">
                        <select  name="article_state_id" id="article_state_id" class="selectpicker">
                          <option value="">Seleccione Estado</option>
                          @foreach($article_states as $article_state)
                          <option value="{{ $article_state->id }}" @if(old('article_state_id') == $article_state->id) {{ 'selected' }} @endif> {{ $article_state->estado }} </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
              

                       <div id="categoriass" class="col-sm-3 hidden">
                      <label for="sub_category_id" class="control-label">Sub Categoría</label>
                      <div class="input-group">
                        <select  name="sub_category_id" id="sub_category" class="selectpicker" >
                          <option value="" >Seleccione SubCategoria </option>
                          @foreach ($subcategories as $subcategory)
                          <option value="{{ $subcategory->id }}" @if(old('sub_category_id') == $subcategory->id) {{ 'selected' }} @endif > {{ $subcategory->subcategoria }} </option>
                          @endforeach
                        </select>
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