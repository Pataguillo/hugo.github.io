@extends('backend.layouts.master')

@section('title','Order Detail')

@section('main-content')
<div class="container-fluid px-4">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="../../order">Inicio</a></li>
        <li class="breadcrumb-item active">Editar Pedido</li>
    </ol>

    <div class="card text-bg-light">
    <form action="{{route('order.update',$order->id)}}" method="POST">
      @csrf
      @method('PATCH')
      <div class="card-body">
                <div class="row g-3">
        <div class="col-12">
        <label for="status">Estatus :</label>
        <select name="status" id="" class="form-control">
          <option value="new" {{($order->status=='delivered' || $order->status=="process" || $order->status=="cancel") ? 'disabled' : ''}}  {{(($order->status=='new')? 'selected' : '')}}>Nuevo</option>
          <option value="process" {{($order->status=='delivered'|| $order->status=="cancel") ? 'disabled' : ''}}  {{(($order->status=='process')? 'selected' : '')}}>Proceso</option>
          <option value="delivered" {{($order->status=="cancel") ? 'disabled' : ''}}  {{(($order->status=='delivered')? 'selected' : '')}}>Entregado</option>
          <option value="cancel" {{($order->status=='delivered') ? 'disabled' : ''}}  {{(($order->status=='cancel')? 'selected' : '')}}>Cancelado</option>
        </select>
        </div>
      </div>
      <div class="card-footer text-center">
                <button type="submit" class="btn " style=" color: #fff;background-color: #6d7fcc;">Actualizar</button>
            </div>
    </form>
  </div>
</div>
@endsection

@push('styles')
<style>
    .order-info,.shipping-info{
        background:#ECECEC;
        padding:20px;
    }
    .order-info h4,.shipping-info h4{
        text-decoration: underline;
    }

</style>
@endpush
