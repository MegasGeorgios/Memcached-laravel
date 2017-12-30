@extends('layouts.app')
@section('content')

<section class="mbr-section form1 cid-qEWowl1Xjg"  data-rv-view="822">

    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8" id="vue">

                          <div >
                            <div class="col-md-4 multi-horizontal" >
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" >NOMBRE CATEGORIA*</label>
                                    <input type="text" class="form-control" name="nombre_categoria" v-model="nombre_categoria"  required>
                                </div>
                            </div>
                            <div class="col-md-4 multi-horizontal" >
                              <div class="form-group" >
                                  <label class="form-control-label mbr-fonts-style display-7" >CARACTERISTICAS DE LA CATEGORIA*</label>
                                  <textarea  class="form-control" name="caracteristicas_categoria" v-model="caracteristicas_categoria" ></textarea>
                              </div>
                            </div>
                            <span class="input-group-btn"><button class="btn btn-primary btn-form display-4"  v-on:click="add()">GUARDAR</button></span>

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
        nombre_categoria: '',
        caracteristicas_categoria:''
    },


    methods: {
        add() {
          console.log(this.caracteristicas_categoria);
            axios.post('/api/categorias', {
                nombre_categoria: this.nombre_categoria,
                caracteristicas_categoria: this.caracteristicas_categoria
            }).then(response => {
                alert(response.data.mensaje);
                location.replace('/crear-producto');

            });

        }
    }
});
</script>

@endsection
