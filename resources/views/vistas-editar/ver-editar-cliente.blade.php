@extends('layouts.app2')
@section('content')


    <div class="container">
            <div id="vue">

                            <div class="col-md-8 " >
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style " >NOMBRE *</label>
                                    <input type="text" class="form-control"  v-model="cliente.nombre"  >
                                </div>
                            </div>
                            <div class="col-md-8 " >
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" >DNI *</label>
                                    <input type="text" class="form-control" v-model="cliente.dni"  required>
                                </div>
                            </div>
                            

                            <div class="col-md-8 " >
                              <button class="btn btn-primary "  v-on:click="putCliente()">ACTUALIZAR</button>
                            </div>
            </div>
    </div>

<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
new Vue({
    el: '#vue',
    data: {
        cliente: {},
    		errors: []
    },
  	created: function() {
      var id = <?php echo json_encode($id); ?>;
      axios.get(`/api/clientes/${id}`)
      .then(response => {
        this.cliente = response.data.datos;
      })
      .catch(e => {
        this.errors.push(e);
      })
    },

    methods: {
        putCliente() {
            axios.put(`/api/clientes/${this.cliente.dni}`, this.cliente)
            .then(response => {
                alert(response.data.mensaje);
                location.reload();

            });

        }
    }
});
</script>
@endsection
