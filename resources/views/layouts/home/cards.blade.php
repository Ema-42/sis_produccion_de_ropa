<div class="row g-3">
    <div class="card text-white mb-2 mr-3 col-md-12" style="background: rgb(22, 136, 111)">
        <div class="card-header"><span style="font-size: 20px">Bienvenido al Sistema</span></div>
        <div class="card-body">
          <p class="card-text"><span style="font-size: 20px">Usuario : {{(auth()->user()->name)}}</span></p>
          <p class="card-text"><span style="font-size: 20px">Rol : {{(auth()->user()->rol)}}</span></p>
        </div>
      </div>
      <div class="row row-cols-1 row-cols-md-3 g-4 mt-2 ">
        <div class="col col-md-3" onclick="window.location.href = '/cotizaciones/create'" style="cursor: grab">
          <div class="card">
            <img style="height: 240px"  src="https://ilkaperea.com/wp-content/uploads/2021/02/quote-for-graphic-designers_cover.jpg" class="card-img-top" alt="Hollywood Sign on The Hill"/>
            <div class="card-body" >
                <a href="/cotizaciones/create" class="btn btn-success mb-1 btn-block" style="width: auto;font-size:18px">Realizar Cotización</a>
                <p class="card-text">Click para iniciar cotizacion</p>
            </div>
          </div>
        </div>
        <div class="col col-md-3" onclick="window.location.href = '/cotizaciones'" style="cursor: grab">
          <div class="card">
            <img style="height: 240px"  src="https://www.argentarium.com/wp-content/uploads/2015/11/revision_portafolio-e1447248979217-890x500_c.jpg" class="card-img-top" alt="Hollywood Sign on The Hill"/>
            <div class="card-body" >
                <a href="/cotizaciones" class="btn btn-primary mb-1 btn-block" style="font-size:18px">Ver Lista de Cotización</a>
                <p class="card-text">Click para ver el listado</p>
              </div>
          </div>
        </div>
        <div class="col col-md-3" onclick="window.location.href = '/clientes/create'" style="cursor: grab">
          <div class="card">
            <img style="height: 240px"  src="https://pbs.twimg.com/media/EkQN8uCX0AAgt5-.png" class="card-img-top" alt="Palm Springs Road"/>
            <div class="card-body">
                <a href="/clientes/create" class="btn btn-info mb-1 btn-block"  style="width: auto;font-size:18px">Registrar Nuevo Cliente</a>
                <p class="card-text">{{$clientes}} registrados</p>
            </div>
          </div>
        </div>
        {{-- @if ($usuario->roles()->first()->name=='Admin') --}}
        {{-- @can('Admin') --}}
        {{-- php artisan cache:clear   = para borrar la cache, al crear cada permiso de rol --}}
        @can('cards.admin')
        {{-- @role('Admin') --}}
        <div class="col col-md-3" onclick="window.location.href = '/articulos/create'" style="cursor: grab">
          <div class="card">
            <img style="height: 240px"  src="https://images.vexels.com/media/users/3/76314/raw/16a229b2cefb744a0c85916465d92b32-ropa-deportiva-para-hombre.jpg" class="card-img-top" alt="Los Angeles Skyscrapers"/>
            <div class="card-body">
                <a href="/articulos/create" class="btn btn-warning mb-1 btn-block" style="width: auto;font-size:18px">Registrar Nuevo Articulo</a>
                <p class="card-text">{{$articulos}} registrados</p>
            </div>
          </div>
        </div>

        <div class="col col-md-3" onclick="window.location.href = '/insumos/create'" style="cursor: grab">
          <div class="card">
            <img style="height: 240px"  src="https://almacenesfreigenedo.com/blog/wp-content/uploads/2022/03/cual-comprar.jpg" class="card-img-top" alt="Los Angeles Skyscrapers"/>
            <div class="card-body">
                <a href="/insumos/create" class="btn mb-1 btn-block" style="width: auto;font-size:18px;background: rgb(243, 140, 72);color: white">Registrar Nuevo Insumo</a>
                <p class="card-text" >{{$insumos}} registrados</p>
            </div>
          </div>
        </div>
        @endcan
        {{-- @endrole --}}
        {{-- @endcan --}}
        {{-- @endif --}}
        
        <div class="col col-md-3" onclick="window.location.href = '/pedidos'" style="cursor: grab">
          <div class="card">
            <img  style="height: 240px"  src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSExOzpMeKSyMAc4LrP3RacREotXKrdLqLecXofc1HuKXzqDgc61QYGKxuiY30HLJh_jxA&usqp=CAU" class="card-img-top" alt="Skyscrapers"/>
            <div class="card-body">
                <a href="/pedidos" class="btn mb-1 btn-block" style="background: rgb(128, 14, 128);width: auto;color: white;font-size:18px">Ver Lista de Pedidos</a>
                <p class="card-text">{{$num_pedidos}} registrados</p>
              </div>
          </div>
        </div>
            
        

        <div class="col col-md-4" onclick="window.location.href = '/produccion/entregados'" style="cursor: grab">
          <div class="card">
            <img style="height: 240px"  src="https://www.adslzone.net/app/uploads-adslzone.net/2021/03/crear-encuestas.png" class="card-img-top" alt="Skyscrapers"/>
            <div class="card-body">
                <a href="/produccion/entregados" class="btn mb-1 btn-block" style="background: rgb(14, 129, 206);width: auto;color: white;font-size:18px">Ver Lista de Pedidos Entregados</a>
                <p class="card-text">Ultimo pedido entregado a {{$nombre}} {{$ap_paterno}} {{$ap_materno}} a las {{$fecha_UltPedido}}</p>
            </div>
          </div>
        </div>
      </div>
</div>
