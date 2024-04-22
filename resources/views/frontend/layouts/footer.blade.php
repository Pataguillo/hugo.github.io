
<footer class="footer">
<footer class="text-center text-lg-start text-white" style="background-color: #1c2331" >
  
  <section class="d-flex justify-content-between p-4" style="background-color: #0074B6">
	
	<div class="me-5">
	  <span></span>
	</div>
  </section>
  <section class="">
	<div class="container text-center text-md-start mt-5">
	  <div class="row mt-3">
		<div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
		  <h6 class="text-uppercase fw-bold">Nombre de la Compañia</h6>
		  <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #0074B6; height: 2px" />
		  <p>CSI Computadoras y Sistema de Itsmo
		  </p>
		</div>
		<div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
		  <h6 class="text-uppercase fw-bold">Productos</h6>
		  <hr class="mb-4 mt-0 d-inline-block mx-auto"
			  style="width: 60px; background-color: #0074B6; height: 2px"/>
		  <p>Impresoras</p>
		  <p>Tintas para impresoras </p>
		  <p>Discos duros</p>
		  <p>Monitores</p>
		  <p>Memorias USB</p>	
		  <p>Licencias de office y antivirus</p>
		  <p>Tambores de impresora y cartuchos</p>
		</div>
		<div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
		  <h6 class="text-uppercase fw-bold">Contacto</h6>
		  <hr
			  class="mb-4 mt-0 d-inline-block mx-auto"
			  style="width: 60px; background-color: #0074B6; height: 2px"
			  />
		  <p>Teléfono:</p>
		  <p>9711416873</p>
		  <p>Correo electrónico:</p>
		  <p>csistmo@outlook.com</p>
		  <p>Facebook</p>
		  <P>https://www.facebook.com/CSIstmo?mibextid=LQQJ4d</P>
		</div>
	  </div>
	</div>
  </section>
  <div class="text-center p-3"  style="background-color: rgba(0, 0, 0, 0.2)">
</footer>
 

    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery-migrate-3.0.0.js')}}"></script>
	<script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>
	<script src="{{asset('frontend/js/popper.min.js')}}"></script>
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('frontend/js/colors.js')}}"></script>
	<script src="{{asset('frontend/js/slicknav.min.js')}}"></script>
	<script src="{{asset('frontend/js/owl-carousel.js')}}"></script>
	<script src="{{asset('frontend/js/magnific-popup.js')}}"></script>
	<script src="{{asset('frontend/js/waypoints.min.js')}}"></script>
	<script src="{{asset('frontend/js/finalcountdown.min.js')}}"></script>
	<script src="{{asset('frontend/js/nicesellect.js')}}"></script>
	<script src="{{asset('frontend/js/flex-slider.js')}}"></script>
	<script src="{{asset('frontend/js/scrollup.js')}}"></script>
	<script src="{{asset('frontend/js/onepage-nav.min.js')}}"></script>
	{{-- Isotope --}}
	<script src="{{asset('frontend/js/isotope/isotope.pkgd.min.js')}}"></script>
	<script src="{{asset('frontend/js/easing.js')}}"></script>
	<script src="{{asset('frontend/js/active.js')}}"></script>

	
	@stack('scripts')
	<script>
		setTimeout(function(){
		  $('.alert').slideUp();
		},5000);
		$(function() {
			$("ul.dropdown-menu [data-toggle='dropdown']").on("click", function(event) {
				event.preventDefault();
				event.stopPropagation();

				$(this).siblings().toggleClass("show");


				if (!$(this).next().hasClass('show')) {
				$(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
				}
				$(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
				$('.dropdown-submenu .show').removeClass("show");
				});

			});
		});
	  </script>