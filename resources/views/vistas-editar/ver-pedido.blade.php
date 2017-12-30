@extends('layouts.app2')
@section('content')
<div class="container">
      <div id="vue" >
        <div class="form-group ">
          <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-2">Pedido numero : @{{producto.pedido_id}}</h2>
          <label class="form-control-label mbr-fonts-style display-7">CLIENTE</label><br>
          <div class="row">
            <input class="form-control col-md-5" type="text" v-model="producto.dni" disabled>
            <input class="form-control col-md-7" type="text" v-model="producto.nombre" disabled>
          </div>
        </div>

        <div class="form-group ">
          <label class="form-control-label mbr-fonts-style display-7">CANTIDAD DE ARTICULOS Y FECHA DEL PEDIDO</label><br>
          <div class="row">
            <input class="form-control col-md-5" type="text" v-model="producto.cantidad" disabled>
            <input class="form-control col-md-7" type="text" v-model="producto.created_at" disabled>
          </div>
        </div>

        <div class="form-group " >
          <label class="form-control-label mbr-fonts-style display-7">DATOS DE LOS PRODUCTOS</label><br>
          <div class="row" >
            <div v-for="prod in productos">
              <input class="form-control col-md-5" type="text" v-model="prod.nombre_producto" disabled>
              <input class="form-control col-md-2" type="text" v-model="prod.precio+`$`" disabled>
              <input class="form-control col-md-5" type="text" v-model="prod.nombre_categoria" disabled>
              <textarea v-model="prod.caracteristicas" class="form-control col-md-12" rows="8" cols="80" disabled></textarea>
          </div>
        </div>
      </div>


      </div>
</div>
<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
new Vue({
    el: '#vue',
    data: {
        producto: [],
        productos: [],
    		errors: []
    },
  	created: function() {
      var id = JSON.parse(<?php echo json_encode($id); ?>);
      axios.get(`/api/pedidos/${id}`)
      .then(response => {
        this.producto = response.data.datos[0];
        this.productos = response.data.datos;
      })
      .catch(e => {
        this.errors.push(e);
      })
    },


});
</script>
@endsection
