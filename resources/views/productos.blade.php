@extends('layouts.app')
@section('content')

<section class="section-table cid-qEWewHbtTi" id="table1-3" data-rv-view="642">



  <div class="container container-table">
      <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-2">Productos</h2>

      <div class="table-wrapper">
        <div class="container scroll">
          <table class="table" cellspacing="0" id="vue">
            <thead>
              <tr class="table-heads ">

                <th class="head-item mbr-fonts-style display-7">ID</th>
                <th class="head-item mbr-fonts-style display-7">PRODUCTO</th>
                <th class="head-item mbr-fonts-style display-7">CATEGORIA</th>
                <th class="head-item mbr-fonts-style display-7">VER/EDITAR</th>
              </tr>
            </thead>

            <tbody>
            <tr v-for="producto in productos">
              <td class="body-item mbr-fonts-style display-7">@{{producto.id}}</td>
              <td class="body-item mbr-fonts-style display-7">@{{producto.nombre_producto}}</td>
              <td class="body-item mbr-fonts-style display-7">@{{producto.nombre_categoria}}</td>
              <td class="body-item mbr-fonts-style display-7"> <a :href="'/ver-editar-producto/'+producto.id">-ir-</a></td>
            </tr>

          </table>
        </div>

      </div>
    </div>
</section>

<section class="mbr-section content8 cid-qEWfoiKCw0" id="content8-4" data-rv-view="699">

    <div class="container">
        <div class="media-container-row title">
            <div class="col-12 col-md-8">
                <div class="mbr-section-btn align-center">
                  <a class="btn btn-black-outline display-4" href="{{url('/crear-producto')}}">
                    CREAR PRODUCTO
                  </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
	var app = new Vue({
  el: '#vue',
  data: {
		productos: [],
		errors: []
  },
	created: function() {
    axios.get(`/api/productos`)
    .then(response => {
      this.productos = response.data.datos;
    })
    .catch(e => {
      this.errors.push(e);
    })
  }

});
</script>
@endsection
