<div class="row g-3">
    <div class="card text-white bg-success mb-2 mr-3 col-md-12">
        <div class="card-header"><span style="font-size: 20px">Bienvenido al Sistema</span></div>
        <div class="card-body">
          <p class="card-text"><span style="font-size: 20px">Usuario : {{(auth()->user()->name)}}</span></p>
        </div>
      </div>
      <div class="row row-cols-1 row-cols-md-3 g-4 mt-2 ">
        <div class="col col-md-3">
          <div class="card">
            <img style="height: 240px"  src="https://ilkaperea.com/wp-content/uploads/2021/02/quote-for-graphic-designers_cover.jpg" class="card-img-top" alt="Hollywood Sign on The Hill"/>
            <div class="card-body" >
                <a href="/pedidos/create" class="btn btn-success mb-1" style="width: auto;">Realizar Cotización</a>
                <p class="card-text">Click para iniciar cotizacion</p>
              </div>
          </div>
        </div>
        <div class="col col-md-3">
          <div class="card">
            <img style="height: 240px"  src="https://pbs.twimg.com/media/EkQN8uCX0AAgt5-.png" class="card-img-top" alt="Palm Springs Road"/>
            <div class="card-body">
                <a href="/clientes/create" class="btn btn-info mb-1" style="width: auto">Registrar Nuevo Cliente</a>
                <p class="card-text">{{$clientes}} registrados</p>
            </div>
          </div>
        </div>
        <div class="col col-md-3">
          <div class="card">
            <img style="height: 240px"  src="https://images.vexels.com/media/users/3/76314/raw/16a229b2cefb744a0c85916465d92b32-ropa-deportiva-para-hombre.jpg" class="card-img-top" alt="Los Angeles Skyscrapers"/>
            <div class="card-body">
                <a href="/articulos/create" class="btn btn-warning mb-1" style="width: auto">Registrar Nuevo Articulo</a>
                <p class="card-text">{{$articulos}} registrados</p>
            </div>
          </div>
        </div>
        <div class="col col-md-3">
          <div class="card">
            <img  style="height: 240px"  src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSExOzpMeKSyMAc4LrP3RacREotXKrdLqLecXofc1HuKXzqDgc61QYGKxuiY30HLJh_jxA&usqp=CAU" class="card-img-top" alt="Skyscrapers"/>
            <div class="card-body">
                <a href="/pedidos" class="btn mb-1" style="background: rgb(128, 14, 128);width: auto;color: white">Ver Lista de Pedidos</a>
                <p class="card-text">{{$num_pedidos}} registrados</p>
              </div>
          </div>
        </div>
        <div class="col col-md-4">
          <div class="card">
            <img style="height: 240px"  src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSExOzpMeKSyMAc4LrP3RacREotXKrdLqLecXofc1HuKXzqDgc61QYGKxuiY30HLJh_jxA&usqp=CAU" class="card-img-top" alt="Skyscrapers"/>
            <div class="card-body">
                <a href="/produccion/entregados" class="btn mb-1" style="background: rgb(14, 129, 206);width: auto;color: white">Ver Lista de Pedidos Entregados</a>
                <p class="card-text">Ultimo pedido entregado a {{$nombre}} {{$ap_paterno}} {{$ap_materno}} a las {{$fecha_UltPedido}}</p>
            </div>
          </div>
        </div>
      </div>
</div>
