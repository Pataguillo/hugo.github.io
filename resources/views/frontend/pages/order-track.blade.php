@extends('frontend.layouts.master')

@section('title','SISTEMA')

@section('main-content')

<section class="tracking_box_area section_gap py-5">
    <div class="container">
        <div class="tracking_box_inner">
            <p>Para realizar un seguimiento de su pedido, ingrese su ID de pedido en el cuadro a continuación y presione el botón "Seguimiento". esto fue dado
                en su recibo y en el correo electrónico de confirmación que debería haber recibido.</p>
            <form class="row tracking_form my-4" action="{{route('product.track.order')}}" method="post" novalidate="novalidate">
              @csrf
                <div class="col-md-8 form-group">
                    <input type="text" class="form-control p-2"  name="order_number" placeholder="Enter your order number">
                </div>
                <div class="col-md-8 form-group">
                    <button type="submit" value="submit" class="btn submit_btn">Pedido</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection