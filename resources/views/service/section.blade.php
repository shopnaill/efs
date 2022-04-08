  <!--===========================-->
  <!--=         Feature         =-->
  <!--===========================-->
  <section class="featured-ten">
      <div class="container">
          <div class="section-title style-two text-center">
              <h2 class="title wow pixFadeUp" style="visibility: visible; animation-name: pixFadeUp;">What we Offer</h2>
              <p class="wow fadeInUp" data-wow-delay="0.3s"
                  style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                  Blimey ruddy bleeding Elizabeth zonked my good sir hotpot give us a bell<br>
                  blatant no biggie what a load of rubbish gutted mate,
              </p>
          </div><!-- /.section-title -->

          <div class="row">
              @foreach ($services as $service)
 
                  <!-- /.col-lg-4 col-md-6 -->
                  <div class="col-lg-3 col-md-6">
						<div class="saaspik-icon-box-wrapper style-eleven wow fadeInRight" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInRight;">
							<div class="saaspik-icon-box-icon">
								<img src="{{ asset('storage/' . $service->logo) }}" alt="{{ $service->name }}">
							</div>
							<div class="pixsass-icon-box-content">
								<h3 class="pixsass-icon-box-title"><a href="#">
                                    {{ $service->name }}
                                </a></h3>
								<p>
                                    {{ $service->description }}
 								</p>
							</div>
						</div> 
					</div>
              @endforeach


              <!-- /.col-lg-4 col-md-6 -->
          </div><!-- /.row -->
      </div><!-- /.container -->
  </section><!-- /.featured -->
