@extends('layouts.app')
@section('content')

<section class="section-table cid-qEWjOUEMv2" id="table1-6" data-rv-view="702">
  <div class="container container-table">
      <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-2">Clientes</h2>

      <div class="table-wrapper" id="vue">

        <div class="container scroll">
          <table class="table" cellspacing="0">
            <thead>
            <tr class="table-heads ">
              <th class="head-item mbr-fonts-style display-7">DNI</th>
              <th class="head-item mbr-fonts-style display-7">NOMBRE</th>
              <th class="head-item mbr-fonts-style display-7">EDITAR/MOSTRAR</th>
            </tr>
            </thead>

            <tbody>
            <tr v-for="cliente in clientes">
              <td class="body-item mbr-fonts-style display-7">@{{cliente.dni}}</td>
              <td class="body-item mbr-fonts-style display-7">@{{cliente.nombre}}</td>
              <td class="body-item mbr-fonts-style display-7"><a :href="'/ver-editar-cliente/'+cliente.dni">-ir-</a></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
</section>

<section class="mbr-section content8 cid-qEWl8sr6LL" id="content8-7" data-rv-view="759">
    <div class="container">
        <div class="media-container-row title">
            <div class="col-12 col-md-8">
                <div class="mbr-section-btn align-center">
                  <a class="btn btn-black-outline display-4" href="{{url('/crear-cliente')}}">
                    CREAR CLIENTE
                  </a></div>
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
		clientes: [],
		errors: []
  },
	created: function() {
    axios.get(`/api/clientes`)
    .then(response => {
      this.clientes = response.data.datos;
    })
    .catch(e => {
      this.errors.push(e);
    })
  }

});
</script>
@endsection
