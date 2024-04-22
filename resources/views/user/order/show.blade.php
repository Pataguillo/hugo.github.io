@extends('user.layouts.master')

@section('title','Order Detail')

@section('main-content')

<div class="container-fluid">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="../../../../user/order">Regresar</a></li>
    </ol>
</div>
<div class="container-fluid">
<div class="card">
<h5 class="card-header">Datos Generales  
  <button onclick="imprimirTicket()" class="btn" style="color: #fff;background-color: #6d7fcc; margin-left: 700px;">Imprimir Ticket</button>
  </h5>
  <div class="card-body">
    @if($order)
    <section class="confirmation_part section_padding">
      <div class="order_boxes">
        <div class="row">
          <div class="col-lg-6 col-lx-4">
            <div class="text-white p-1 text-center" style="background-color: #4D5FAB;">
            INFORMACION DEL PEDIDO
                </div>
            <div>
              <table class="table">
                    <tr class="">
                        <td>Numero</td>
                        <td> : {{$order->order_number}}</td>
                    </tr>
                    <tr>
                        <td>Fecha</td>
                        <td> : {{$order->created_at->format('D d M, Y')}} at {{$order->created_at->format('g : i a')}} </td>
                    </tr>
                    <tr>
                        <td>Cantidad</td>
                        <td> : {{$order->quantity}}</td>
                    </tr>
                    <tr>
                        <td>Estatus</td>
                        <td> : {{$order->status}}</td>
                    </tr>
                    <tr>
                      @php
                          $shipping_charge=DB::table('shippings')->where('id',$order->shipping_id)->pluck('price');
                      @endphp
                        <td>Shipping Charge</td>
                        <td> :${{$order->shipping->price}}</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td> : $ {{number_format($order->total_amount,2)}}</td>
                    </tr>
                    <tr>
                      <td>Payment Method</td>
                      <td> : @if($order->payment_method=='cod') Cash on Delivery @else Paypal @endif</td>
                    </tr>
                    <tr>
                        <td>Payment Status</td>
                        <td> : {{$order->payment_status}}</td>
                    </tr>
              </table>
            </div>
          </div>

          <div class="col-lg-6 col-lx-4">
          <div class="text-white p-1 text-center" style="background-color: #4D5FAB;">
          INFORMACIÓN DE ENVÍO
                </div>
            <div >
              <table class="table">
                    <tr class="">
                        <td>Nombre</td>
                        <td> : {{$order->first_name}} {{$order->last_name}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td> : {{$order->email}}</td>
                    </tr>
                    <tr>
                        <td>Numero de Telefono</td>
                        <td> : {{$order->phone}}</td>
                    </tr>
                    <tr>
                        <td>Calles</td>
                        <td> : {{$order->address1}}, {{$order->address2}}</td>
                    </tr>
                    <tr>
                        <td>Pais</td>
                        <td> : {{$order->country}}</td>
                    </tr>
                    <tr>
                        <td>Codigo Postal</td>
                        <td> : {{$order->post_code}}</td>
                    </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endif
    </div>
  </div>
</div>
@endsection

@push('styles')
<script>
    function imprimirTicket() {
        window.print();
    }
</script>
@endpush
