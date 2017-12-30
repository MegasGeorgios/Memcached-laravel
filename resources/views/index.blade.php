@extends('layouts.app')
@section('content')
<section class="section-table cid-qEWnn6EOZs" id="table1-a" data-rv-view="762">

  <div class="container container-table">
      <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-2">Pedidos</h2>

      <div class="table-wrapper" id="vue">

        <div class="container scroll">
          <table class="table" cellspacing="0">
            <thead>
              <tr class="table-heads ">

                <th class="head-item mbr-fonts-style display-7">ID-PEDIDO</th>
                <th class="head-item mbr-fonts-style display-7">CLIENTE</th>
                <th class="head-item mbr-fonts-style display-7"># DE ART.</th>
                <th class="head-item mbr-fonts-style display-7">FECHA</th>
                <th class="head-item mbr-fonts-style display-7">VER</th>
              </tr>
            </thead>

            <tbody>
            <tr v-for="pedido in pedidos">
              <td class="body-item mbr-fonts-style display-7">@{{pedido.id}}</td>
              <td class="body-item mbr-fonts-style display-7">@{{pedido.nombre}}</td>
              <td class="body-item mbr-fonts-style display-7">@{{pedido.cantidad}}</td>
              <td class="body-item mbr-fonts-style display-7">@{{pedido.created_at}}</td>
              <td class="body-item mbr-fonts-style display-7"><a :href="'/ver-pedido/'+pedido.id">-ir-</a></td>
            </tr>
          </table>
        </div>

      </div>
    </div>
</section>

<section class="mbr-section content8 cid-qEWnfoEmuR" id="content8-9" data-rv-view="819">

    <div class="container">
        <div class="media-container-row title">
            <div class="col-12 col-md-8">
                <div class="mbr-section-btn align-center">
                  <a class="btn btn-black-outline display-4" href="{{url('/crear-pedido')}}">
                    CREAR PEDIDO
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
		pedidos: [],
		errors: []
  },
	created: function() {
    axios.get(`/api/dashboard`)
    .then(response => {
      this.pedidos = response.data.pedidos;
    })
    .catch(e => {
      this.errors.push(e);
    })
  }

});
</script>
@endsection
