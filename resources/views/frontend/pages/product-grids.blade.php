@extends('frontend.layouts.master')

@section('title','SISTEMA')

@section('main-content')

    <form action="{{route('shop.filter')}}" method="POST">
        @csrf
        <section class="product-area shop-sidebar shop section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="shop-sidebar">

                                <div class="single-widget category">
                                    <h3 class="title">Categorias</h3>
                                    <ul class="categor-list">
										@php
											// $category = new Category();
											$menu=App\Models\Category::getAllParentWithChild();
										@endphp
										@if($menu)
										<li>
											@foreach($menu as $cat_info)
													@if($cat_info->child_cat->count()>0)
														<li><a href="{{route('product-cat',$cat_info->slug)}}">{{$cat_info->title}}</a>
															<ul>
																@foreach($cat_info->child_cat as $sub_menu)
																	<li><a href="{{route('product-sub-cat',[$cat_info->slug,$sub_menu->slug])}}">{{$sub_menu->title}}</a></li>
																@endforeach
															</ul>
														</li>
													@else
														<li><a href="{{route('product-cat',$cat_info->slug)}}">{{$cat_info->title}}</a></li>
													@endif
											@endforeach
										</li>
										@endif
                                        {{-- @foreach(Helper::productCategoryList('products') as $cat)
                                            @if($cat->is_parent==1)
												<li><a href="{{route('product-cat',$cat->slug)}}">{{$cat->title}}</a></li>
											@endif
                                        @endforeach --}}
                                    </ul>
                                </div>

                                <div class="single-widget category">
                                    <h3 class="title">Marcas</h3>
                                    <ul class="categor-list">
                                        @php
                                            $brands=DB::table('brands')->orderBy('title','ASC')->where('status','active')->get();
                                        @endphp
                                        @foreach($brands as $brand)
                                            <li><a href="{{route('product-brand',$brand->slug)}}">{{$brand->title}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                              
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="shop-top">
                                    <div class="shop-shorter">
                                        <div class="single-shorter">
                                            <label>Expecifico :</label>
                                            <select class="show" name="show" onchange="this.form.submit();">
                                                <option value="">Por defecto</option>
                                                <option value="9" @if(!empty($_GET['show']) && $_GET['show']=='9') selected @endif>09</option>
                                                <option value="15" @if(!empty($_GET['show']) && $_GET['show']=='15') selected @endif>15</option>
                                                <option value="21" @if(!empty($_GET['show']) && $_GET['show']=='21') selected @endif>21</option>
                                                <option value="30" @if(!empty($_GET['show']) && $_GET['show']=='30') selected @endif>30</option>
                                            </select>
                                        </div>
                                        <div class="single-shorter">
                                            <label>Ordenar por:</label>
                                            <select class='sortBy' name='sortBy' onchange="this.form.submit();">
                                                <option value="">Por defecto</option>
                                                <option value="title" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='title') selected @endif>Nombre</option>
                                                <option value="price" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='price') selected @endif>Precio</option>
                                                <option value="category" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='category') selected @endif>Categoria</option>
                                                <option value="brand" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='brand') selected @endif>Marca</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{-- {{$products}} --}}
                            @if(count($products)>0)
                                @foreach($products as $product)
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-product">
                                            <div class="product-img">
                                                <a href="{{route('product-detail',$product->slug)}}">
                                                    @php
                                                        $photo=explode(',',$product->photo);
                                                    @endphp
                                                    <img class="default-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                                    <img class="hover-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                                    @if($product->discount)
                                                                <span class="price-dec">{{$product->discount}} % Off</span>
                                                    @endif
                                                </a>
                                                <div class="button-head">
                                                    <div class="product-action">
                                                        <a  href="{{route('add-to-wishlist',$product->slug)}}" class="wishlist" data-id="{{$product->id}}"><i class=" ti-heart "></i><span>Favoritos</span></a>
                                                    </div>
                                                    <div class="product-action-2">
                                                        <a  href="{{route('add-to-cart',$product->slug)}}">Saber mas..</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a></h3>
                                                @php
                                                    $after_discount=($product->price-($product->price*$product->discount)/100);
                                                @endphp
                                                <span>${{number_format($after_discount,2)}}</span>
                                                <del style="padding-left:4%;">${{number_format($product->price,2)}}</del>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                    <h4 class="text-warning" style="margin:100px auto;">No hay productos.</h4>
                            @endif



                        </div>
                        <div class="row">
                            <div class="col-md-12 justify-content-center d-flex">
                                {{$products->appends($_GET)->links()}}
                            </div>
                          </div>

                    </div>
                </div>
            </div>
        </section>
    </form>

@endsection
@push('styles')
<style>
    .pagination{
        display:inline-flex;
    }
    .filter_button{
        text-align: center;
        background:#0074B6;
        padding:8px 16px;
        margin-top:10px;
        color: white;
    }
</style>
@endpush
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    {{-- <script>
        $('.cart').click(function(){
            var quantity=1;
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
						});
                    }
                }
            })
        });
    </script> --}}
    <script>
        $(document).ready(function(){
        if ($("#slider-range").length > 0) {
            const max_value = parseInt( $("#slider-range").data('max') ) || 500;
            const min_value = parseInt($("#slider-range").data('min')) || 0;
            const currency = $("#slider-range").data('currency') || '';
            let price_range = min_value+'-'+max_value;
            if($("#price_range").length > 0 && $("#price_range").val()){
                price_range = $("#price_range").val().trim();
            }

            let price = price_range.split('-');
            $("#slider-range").slider({
                range: true,
                min: min_value,
                max: max_value,
                values: price,
                slide: function (event, ui) {
                    $("#amount").val(currency + ui.values[0] + " -  "+currency+ ui.values[1]);
                    $("#price_range").val(ui.values[0] + "-" + ui.values[1]);
                }
            });
            }
        if ($("#amount").length > 0) {
            const m_currency = $("#slider-range").data('currency') || '';
            $("#amount").val(m_currency + $("#slider-range").slider("values", 0) +
                "  -  "+m_currency + $("#slider-range").slider("values", 1));
            }
        })
    </script>
@endpush
