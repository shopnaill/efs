  <!--===========================-->
  <!--=         Feature         =-->
  <!--===========================-->
  <section class="featured-ten">
      <div class="container">
          <div class="section-title style-two text-center">
              <h2 class="title wow pixFadeUp" style="visibility: visible; animation-name: pixFadeUp;">
                    {{__('Our Services')}}
             </h2>
              <p class="wow fadeInUp" data-wow-delay="0.3s"
                  style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                    {{__('We are a team of passionate designers and developers that works hard to create high quality web apps and user interfaces with the latest technologies.')}}
              </p>
          </div><!-- /.section-title -->

          <div class="row">
              @foreach ($services as $service)
 
                  <!-- /.col-lg-4 col-md-6 -->
                  <div class="col-lg-3 col-md-6">
						<div class="saaspik-icon-box-wrapper style-eleven wow fadeInRight" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInRight;">
							<div class="saaspik-icon-box-icon">
								<img src="{{ asset('storage/' . $service->logo) }}" alt="{{ $service->getName() }}">
							</div>
							<div class="pixsass-icon-box-content">
								<h3 class="pixsass-icon-box-title"><a href="#">
                                    {{ $service->getName() }}
                                </a></h3>
								<p>
                                    {!! $service->getDescription() !!}
 								</p>
							</div>
						</div> 
					</div>
              @endforeach


              <!-- /.col-lg-4 col-md-6 -->
          </div><!-- /.row -->
      </div><!-- /.container -->
  </section><!-- /.featured -->
