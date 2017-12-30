@extends('layouts.app')
@section('content')
<section class="mbr-section form1 cid-qEWsypUcdd" >

    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8" >
              <div id="vue" >

                <div class="col-md-4 multi-horizontal" >
                  <div class="form-group">
                    <label class="form-control-label mbr-fonts-style display-7" >SELECCIONE EL CLIENTE *<a href="{{url('/crear-cliente')}}" >(crear nuevo)</a> </label>
                    <select class="form-control" name="cliente_dni" v-model="cliente_dni"  required>
                        <option v-for="cliente in clientes">@{{cliente.dni}}-@{{cliente.nombre}}</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-4 multi-horizontal" >
                  <div class="form-group">
                    <label class="form-control-label mbr-fonts-style display-7" >SELECCIONE LOS PRODUCTOS *<a href="{{url('/crear-producto')}}" >(crear otro)</a> </label>
                    <select multiple class="form-control" name="producto_id" v-model="producto_id"  required>
                        <option v-for="producto in productos" :value="producto.id">@{{producto.nombre_producto}}</option>
                    </select>
                  </div>
                </div>

                  <span class="input-group-btn"><button class="btn btn-primary btn-form display-4" v-on:click="add_pedido()">GUARDAR</button></span>
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
  clientes: [],
  cliente_dni: '',
  productos: [],
  producto_id: []
},
created: function() {
axios.get(`/api/pedidos`)
.then(response => {
  this.clientes = response.data.clientes;
  this.productos = response.data.productos;
})
.catch(e => {
  this.errors.push(e);
})
},

methods: {

  add_pedido() {
      axios.post('/api/pedidos', {
          cliente_dni: this.cliente_dni,
          producto_id: this.producto_id
      }).then(response => {
          location.replace('/pedidos');

      });

  }
}
});
</script>
@endsection
