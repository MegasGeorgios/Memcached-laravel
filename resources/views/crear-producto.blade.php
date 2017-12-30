@extends('layouts.app')
@section('content')
<section class="mbr-section form1 cid-qEWpUAKW1L" id="form1-f" data-rv-view="827">

    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8" data-form-type="formoid">

                    <div id="vue" >

                        <div class="col-md-4 multi-horizontal" data-for="name">
                            <div class="form-group">
                                <label class="form-control-label mbr-fonts-style display-7" for="name-form1-f">Nombre del producto *</label>
                                <input type="text" class="form-control" name="nombre_producto" v-model="nombre_producto" data-form-field="Name" required="" id="name-form1-f">
                            </div>
                        </div>

                        <div class="col-md-4 multi-horizontal" data-for="name">
                            <div class="form-group">
                              <label class="form-control-label mbr-fonts-style display-7" for="message-form1-f">PRECIO *</label>
                              <input type="number" class="form-control" name="precio" v-model="precio" data-form-field="Name" required="" >
                            </div>
                        </div>

                        <div class="col-md-4 multi-horizontal" >
                          <div class="form-group" >
                              <label class="form-control-label mbr-fonts-style display-7" >CARACTERISTICAS DEL PRODUCTO*</label>
                              <textarea  class="form-control" name="caracteristicas" v-model="caracteristicas" ></textarea>
                          </div>
                        </div>

                        <div class="col-md-4 multi-horizontal" >
                          <div class="form-group">
                            <label class="form-control-label mbr-fonts-style display-7" >CATEGORIA *<a href="{{url('/crear-categoria')}}" >(crear nueva)</a> </label>
                            <select class="form-control" name="id_categoria" v-model="id_categoria"  required>
                                <option v-for="categoria in categorias" >@{{categoria.id}}-@{{categoria.nombre_categoria}}</option>
                            </select>
                          </div>
                        </div>

                        <span class="input-group-btn"><button class="btn btn-primary btn-form display-4" v-on:click="add_producto()">GUARDAR</button></span>
                    </div>
            </div>
        </div>
    </div>
</section>
<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
new Vue({
    el: '#vue',
    data: {
        nombre_producto: '',
        precio: '',
        categorias: [],
        nombre_categoria: '',
        id_categoria: '',
        caracteristicas:''
    },
  	created: function() {
      axios.get(`/api/categorias`)
      .then(response => {
        this.categorias = response.data.datos;
      })
      .catch(e => {
        this.errors.push(e);
      })
    },

    methods: {

        add_producto() {
          //console.log(this.caracteristicas_producto);
            axios.post('/api/productos', {
                nombre_producto: this.nombre_producto,
                precio: this.precio,
                id_categoria: this.id_categoria,
                caracteristicas: this.caracteristicas
            }).then(response => {
                alert(response.data.mensaje);
                location.reload();

            });

        }
    }
});
</script>
@endsection
