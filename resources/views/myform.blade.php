@extends('layouts.app') @section('content')
<!--Contenido-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Main content -->
  <section class="content">

    <div class="row">
            <div class="container">
                    <div class="panel panel-default">
                      <div class="panel-heading">Select State and get bellow Related City</div>
                      <div class="panel-body">
                            <div class="form-group">
                                <label for="title">Select State:</label>
                                <select name="state" class="form-control" style="width:350px">
                                    <option value="">--- Select State ---</option>
                                    @foreach ($states as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Select City:</label>
                                <select name="nombre_articulo" class="form-control" style="width:350px">
                                </select>
                            </div>
                      </div>
                    </div>
                </div>
                
                
                <script type="text/javascript">
                    
                </script>
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