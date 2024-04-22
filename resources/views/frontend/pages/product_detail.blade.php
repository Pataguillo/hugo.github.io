@extends('frontend.layouts.master')

@section('meta')
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="online shop, purchase, cart, ecommerce site, best online shopping">
	<meta name="description" content="{{$product_detail->summary}}">
	<meta property="og:url" content="{{route('product-detail',$product_detail->slug)}}">
	<meta property="og:type" content="article">
	<meta property="og:title" content="{{$product_detail->title}}">
	<meta property="og:image" content="{{$product_detail->photo}}">
	<meta property="og:description" content="{{$product_detail->description}}">
@endsection
@section('title','SISTEMA')
@section('main-content')
				
		<section class="shop single section">
					<div class="container">
						<div class="row"> 
							<div class="col-12">
								<div class="row">
									<div class="col-lg-6 col-12">
										<div class="product-gallery">
											<div class="flexslider-thumbnails">
												<ul class="slides">
													@php 
														$photo=explode(',',$product_detail->photo);
													// dd($photo);
													@endphp
													@foreach($photo as $data)
														<li data-thumb="{{$data}}" rel="adjustX:10, adjustY:">
														<img src="{{ asset($data) }}" alt="{{$data}}" class="img-fluid" width="100px">
														</li>
													@endforeach
												</ul>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-12">
										<div class="product-des">
											<div class="short">
												<h4>{{$product_detail->title}}</h4>
                                                @php 
                                                    $after_discount=($product_detail->price-(($product_detail->price*$product_detail->discount)/100));
                                                @endphp
												<p class="price"><span class="discount">${{number_format($after_discount,2)}}</span><s>${{number_format($product_detail->price,2)}}</s> </p>
												<p class="description">{!!($product_detail->summary)!!}</p>
											</div>
											{{-- <div class="color">
												<h4>Available Options <span>Color</span></h4>
												<ul>
													<li><a href="#" class="one"><i class="ti-check"></i></a></li>
													<li><a href="#" class="two"><i class="ti-check"></i></a></li>
													<li><a href="#" class="three"><i class="ti-check"></i></a></li>
													<li><a href="#" class="four"><i class="ti-check"></i></a></li>
												</ul>
											</div> --}}
											@if($product_detail->size)
												<div class="size mt-4">
													<h4>Tamaño</h4>
													<ul>
														@php 
															$sizes=explode(',',$product_detail->size);
															// dd($sizes);
														@endphp
														@foreach($sizes as $size)
														<li><a href="#" class="one">{{$size}}</a></li>
														@endforeach
													</ul>
												</div>
											@endif
											<div class="product-buy">
												<form action="{{route('single-add-to-cart')}}" method="POST">
													@csrf 
													<div class="quantity">
														<h6>Cantidad :</h6>
														<div class="input-group">
															<div class="button minus">
																<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
																	<i class="ti-minus"></i>
																</button>
															</div>
															<input type="hidden" name="slug" value="{{$product_detail->slug}}">
															<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1" id="quantity">
															<div class="button plus">
																<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
																	<i class="ti-plus"></i>
																</button>
															</div>
														</div>
													</div>
													<div class="add-to-cart mt-4">
														<button type="submit" class="btn">Comprar</button>
														<a href="{{route('add-to-wishlist',$product_detail->slug)}}" class="btn min"><i class="ti-heart"></i></a>
													</div>
												</form>

												<p class="cat">Categoria :<a href="{{route('product-cat',$product_detail->cat_info['slug'])}}">{{$product_detail->cat_info['title']}}</a></p>
												@if($product_detail->sub_cat_info)
												<p class="cat mt-1">Sub Category :<a href="{{route('product-sub-cat',[$product_detail->cat_info['slug'],$product_detail->sub_cat_info['slug']])}}">{{$product_detail->sub_cat_info['title']}}</a></p>
												@endif
												<p class="availability">Stock : @if($product_detail->stock>0)<span class="badge badge-success">{{$product_detail->stock}}</span>@else <span class="badge badge-danger">{{$product_detail->stock}}</span>  @endif</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
		</section>

	<div class="product-area most-popular related-product section">
        <div class="container">
            <div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>Productos que te puede interesar</h2>
					</div>
				</div>
            </div>
            <div class="row">
                {{-- {{$product_detail->rel_prods}} --}}
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
                        @foreach($product_detail->rel_prods as $data)
                            @if($data->id !==$product_detail->id)
                                <div class="single-product">
                                    <div class="product-img">
										<a href="{{route('product-detail',$data->slug)}}">
											@php 
												$photo=explode(',',$data->photo);
											@endphp
											
											<img src="{{ asset($photo[0]) }}" alt="{{$photo[0]}}" class="img-fluid" width="100px">
                                            <span class="price-dec">{{$data->discount}} % Off</span>
                                        </a>
                                        <div class="button-head">
                                            <div class="product-action">
                                                <a  href="#"><i class=" ti-heart "></i><span>Favoritos</span></a>
                                                <a  href="#"><i class="ti-bar-chart-alt"></i><span>Comprar</span></a>
                                            </div>
                                            <div class="product-action-2">
                                                <a  href="#">Añadir</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="{{route('product-detail',$data->slug)}}">{{$data->title}}</a></h3>
                                        <div class="product-price">
                                            @php 
                                                $after_discount=($data->price-(($data->discount*$data->price)/100));
                                            @endphp
                                            <span class="old">${{number_format($data->price,2)}}</span>
                                            <span>${{number_format($after_discount,2)}}</span>
                                        </div>
                                      
                                    </div>
                                </div>
                                	
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
@push('styles')
	<style>
		.rating_box {
		display: inline-flex;
		}

		.star-rating {
		font-size: 0;
		padding-left: 10px;
		padding-right: 10px;
		}

		.star-rating__wrap {
		display: inline-block;
		font-size: 1rem;
		}

		.star-rating__wrap:after {
		content: "";
		display: table;
		clear: both;
		}

		.star-rating__ico {
		float: right;
		padding-left: 2px;
		cursor: pointer;
		color: #F7941D;
		font-size: 16px;
		margin-top: 5px;
		}

		.star-rating__ico:last-child {
		padding-left: 0;
		}

		.star-rating__input {
		display: none;
		}

		.star-rating__ico:hover:before,
		.star-rating__ico:hover ~ .star-rating__ico:before,
		.star-rating__input:checked ~ .star-rating__ico:before {
		content: "\F005";
		}

	</style>
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    {{-- <script>
        $('.cart').click(function(){
            var quantity=$('#quantity').val();
            var pro_id=$(this).data('id');
            $.ajax({
                url:"{{route('add-to-cart')}}",
                type:"POST",
                data:{
                    _token:"{{csrf_token()}}",
                    quantity:quantity,
                    pro_id:pro_id
                },
                success:function(response){
                    console.log(response);
					if(typeof(response)!='object'){
						response=$.parseJSON(response);
					}
					if(response.status){
						swal('success',response.msg,'success').then(function(){
							document.location.href=document.location.href;
						});
					}
					else{
                        swal('error',response.msg,'error').then(function(){
							document.location.href=document.location.href;
						});
                    }
                }
            })
        });
    </script> --}}

@endpush