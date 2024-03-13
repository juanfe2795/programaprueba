@extends('layouts.app')
@section('title', __('Dashboard'))
@section('content')
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-4">
          <div class="card bg-info p-3">
            <div class="row">
              <div class="col-md-2">
                <h1 class="text-center"><i class="text-black fa fa-building"></i></h1>
              </div>
              <div class="col-md-4">
                <div class="text-black text-center mt-3"> <link rel="stylesheet" href="/Empresas"> <h5>Empresa</h5></div>
              </div>
              <div class="col-md-6">
                <div class="text-black text-center mt-2"><h1>{{$empresa}}</h1></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card bg-success p-3">
            <div class="row">
              <div class="col-md-2">
                <h1 class="text-center"><i class="text-black fa fa-sack-dollar"></i></h1>
              </div>
              <div class="col-md-4">
                <div class="text-white text-center mt-3"><h5>Ingresos</h5></div>
              </div>
              <div class="col-md-6">
                <div class="text-white text-center mt-2"><h1>{{$ingreso}}</h1></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card bg-warning p-3">
            <div class="row">
              <div class="col-md-2">
                <h1 class="text-center"><i class="text-black fa fa-cash-register"></i></h1>
              </div>
              <div class="col-md-4">
                <div class="text-black text-center mt-3"><h5>Egreso</h5></div>
              </div>
              <div class="col-md-6">
                <div class="text-white text-center mt-2"><h1>{{$egreso}}</h1></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-4">
          <div class="card bg-primary p-3">
            <div class="row">
              <div class="col-md-2">
                <h1 class="text-center"><i class="text-black fa fa-piggy-bank"></i></h1>
              </div>
              <div class="col-md-4">
                <div class="text-white text-center mt-3"><h5>Ahorro</h5></div>
              </div>
              <div class="col-md-6">
                <div class="text-white text-center mt-2"><h1>{{$ahorro}}</h1></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card bg-danger p-3">
            <div class="row">
              <div class="col-md-2">
                <h1 class="text-center"><i class="text-black fa fa-xmark"></i></h1>
              </div>
              <div class="col-md-4">
                <div class="text-white text-center mt-3"><h5>Deudas</h5></div>
              </div>
              <div class="col-md-6">
                <div class="text-white text-center mt-2"><h1>{{$deuda}}</h1></div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection