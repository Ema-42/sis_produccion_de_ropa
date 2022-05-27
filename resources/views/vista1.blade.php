@extends('layouts.vistapadre')
@section('contenidoPrincipal')
<h2>Contenido principal en vista 1</h2>
<div class="card">
    <h5 class="card-header">Featured</h5>
    <div class="card-body">
      <h5 class="card-title">Special title treatment</h5>
      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>

@if (count($users)===1)
    <span class="badge bg-primary">Hay un solo elemento en la lista</span>
@elseif (count($users)>1)
<span class="badge bg-success">Hay varios elementos en la lista</span>
@else
<span class="badge bg-danger">No hay elementos</span>
@endif

<ul>
    @for ($i = 0; $i <= 15; $i++)
          <li>'el valor es {{$i}}'</li>
    @endfor
</ul>
<ul>
    @foreach ($users as $user)
    <li> {{$user}}</li> 
       @endforeach
</ul>  
@endsection
