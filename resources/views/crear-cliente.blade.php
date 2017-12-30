@extends('layouts.app')
@section('content')

<section class="mbr-section form1 cid-qEWowl1Xjg"  data-rv-view="822">

    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8" id="vue">

                          <div >
                            <div class="col-md-4 multi-horizontal" >
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" >NOMBRE *</label>
                                    <input type="text" class="form-control" name="nombre" v-model="nombre"  required>
                                </div>
                            </div>
                            <div class="col-md-4 multi-horizontal" >
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" >DNI *</label>
                                    <input type="text" class="form-control" name="dni" v-model="dni"  required>
                                </div>
                            </div>

                        </div>


                        <span class="input-group-btn"><button class="btn btn-primary btn-form display-4"  v-on:click="add()">GUARDAR</button></span>
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
        nombre: '',
        dni: ''
    },

    methods: {
        add() {
            axios.post('/api/clientes', {
                nombre: this.nombre,
                dni: this.dni
            }).then(response => {
                alert(response.data.mensaje);
                location.reload();

            });

        }
    }
});
</script>
@endsection
