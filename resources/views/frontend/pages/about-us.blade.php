@extends('frontend.layouts.master')

@section('title','SISTEMA')

@section('main-content')
	<section class="about-us section">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="about-content">
							@php
								$settings=DB::table('settings')->get();
							@endphp
							<h3><span>CSI Computadoras y Sistema de Itsmo</span></h3>
							<p>CSI Surge ante las  necesidades mostradas por el mercado de consumidores de equipos de cómputo y consumibles,manejamos una gran gama de productos en la industria informática.
							<h3><span>Nuestro objetivo</span> </h3>                        
								Nuestro objetivo es satisfacer a nuestros clientes ser siempre la primera opción, impulsando el comercio electrónico               y facilitar la compra de nuestros clientes desde que solicitan un producto hasta tenerlo en las puertas de su casa.
							<h3><span>Misión</span> </h3>       
								Ser el principal socio de negocios de nuestros clientes. 
						</div>
					</div>
					<div class="col-lg-6 col-12">
						<img src="/frontend/img/Ciber.jpeg" class="img-fluid" width="100%" height="50%">
						</div>
					</div>
				</div>
			</div>
	</section>


@endsection
