@extends('principal')

@section('contenido')
<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item active"><a href="/">BACKEND - SISTEMA DE COMPRAS - VENTAS</a></li>
    </ol>
    <div class="container-fluid">
      <!-- Ejemplo de tabla Listado -->
      <div class="card">
        <div class="card-header">
          <h2>Listado de Categorías</h2><br/>
          <button class="btn btn-primary btn-lg" type="button" @click="abrirModal( 'categoria', 'registrar')">
            <i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp;Agregar Categoría
          </button>
        </div>
        <div class="card-body">
          <div class="form-group row">
            <div class="col-md-6">
              <div class="input-group">
                <select class="form-control col-md-3" v-model="criterio">
                  <option value="nombre">Categoría</option>
                  <option value="descripcion">Descripción</option>
                </select>
                <input type="text" @keyup.enter="listarCategoria(1, buscar, criterio);" v-model="buscar" class="form-control" placeholder="Buscar texto">
                <button type="submit" @click="listarCategoria(1, buscar, criterio);" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
              </div>
            </div>
          </div>
          <table class="table table-bordered table-striped table-sm">
            <thead>
              <tr class="bg-primary">
                <th>Fecha Solicitud</th>
                <th>Diagnostico</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach( $listas as $patiente )
                <tr>        
                  <td>{{ $patiente->fec_solici }}</td>
                  <td>{{ $patiente->cod_patol1 }}</td>       
                  <td>         
                    <form action="{{ url('/patients/'.$patiente->lisesp) }}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <a href="{{ url('/patients/'.$patiente->lisesp.'/edit') }}" class="btn btn-sm btn-primary">Editar</a>
                      <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                
                  </td>
                </tr>   
              @endforeach               
            </tbody>
          </table>
          {{ $listas->links() }}
        <!-- AQUI PAGINACION -->
        </div>
      </div>
              <!-- Fin ejemplo de tabla Listado -->
    </div>
          <!--Inicio del modal agregar/actualizar-->
    <div class="modal fade" :class="{'mostrar':modal}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-primary modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" v-text="tituloModal"></h4>
            <button type="button" class="close" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
                      
          <div class="modal-body">                          
            <div v-show="errorCategoria" class="form-group row div-error">                              
              <div class="text-center text-error">                                  
                <div v-for="error in errorMostrarMsjCategoria" :key="error" v-text="error"></div>
              </div>
            </div>

            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="form-group row">
                <label class="col-md-3 form-control-label" for="text-input">Categoría</label>
                <div class="col-md-9">
                    <input type="text" v-model="nombre" class="form-control" placeholder="Nombre de categoría">
                    
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 form-control-label" for="email-input">Descripción</label>
                <div class="col-md-9">
                <input type="text" v-model="descripcion" class="form-control" placeholder="Ingrese descripcion">
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" @click="cerrarModal()" class="btn btn-danger"><i class="fa fa-times fa-2x"></i> Cerrar</button>
            <button type="button" @click="registrarCategoria()" v-if="tipoAccion==1" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Guardar</button>
            <button type="button" @click="actualizarCategoria()" v-if="tipoAccion==2" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Actualizar</button>

          </div>
        </div>
      <!-- /.modal-content -->
      </div>
    <!-- /.modal-dialog -->
    </div>
    <!--Fin del modal-->
</main>

@endsection
