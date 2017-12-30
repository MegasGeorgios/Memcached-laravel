@extends('layouts.app2')
@section('content')

    <div class="container">

                    <div id="vue" >

                        <div class="col-md-12 multi-horizontal" data-for="name">
                            <div class="form-group">
                                <label class="form-control-label mbr-fonts-style display-7" for="name-form1-f">Nombre del producto *</label>
                                <input type="text" class="form-control" name="nombre_producto" v-model="producto.nombre_producto" data-form-field="Name" required="" id="name-form1-f">
                            </div>
                        </div>

                        <div class="col-md-12 multi-horizontal" data-for="name">
                            <div class="form-group">
                              <label class="form-control-label mbr-fonts-style display-7" for="message-form1-f">PRECIO *</label>
                              <input type="number" class="form-control" name="precio" v-model="producto.precio" data-form-field="Name" required="" >
                            </div>
                        </div>

                        <div class="col-md-12 multi-horizontal" >
                          <div class="form-group" >
                              <label class="form-control-label mbr-fonts-style display-7" >CARACTERISTICAS DEL PRODUCTO*</label>
                              <textarea  class="form-control" name="caracteristicas" v-model="producto.caracteristicas" ></textarea>
                          </div>
                            <input type="hidden" class="form-control"  v-model="producto.categoria_id"  required="" >
                        </div>

                        <div class="col-md-12 multi-horizontal" >
                          <span class="input-group-btn"><button class="btn btn-primary btn-form display-4" v-on:click="putProducto()">ACTUALIZAR</button></span>
                        </div>


    </div>
<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
new Vue({
    el: '#vue',
    data: {
        producto: [],
    		errors: []
    },
  	created: function() {
      var id = JSON.parse(<?php echo json_encode($id); ?>);
      axios.get(`/api/productos/${id}`)
      .then(response => {
        this.producto = response.data.datos;
      })
      .catch(e => {
        this.errors.push(e);
      })
    },

    methods: {
        putProducto() {
            axios.put(`/api/productos/${this.producto.id}`, this.producto)
            .then(response => {
                alert(response.data.mensaje);
                location.reload();
            });
        }
    }
});
</script>
@endsection
