  <section class="banner banner-nine" data-bg-image="images/manner-marketing.png"
      style="background-image: url({{asset('images/manner-marketing.png')}});">
      <div class="container">
          <div class="banner-content text-center">
              <h1 class="banner-title wow pixFadeUp" data-wow-delay="0.3s"
                  style="visibility: visible; animation-delay: 0.3s; animation-name: pixFadeUp;">
                   {{ $slider->getName() }}
              </h1>

              <p class="description wow pixFadeUp" data-wow-delay="0.5s"
                  style="visibility: visible; animation-delay: 0.5s; animation-name: pixFadeUp;">
                    {!! $slider->getDescription() !!}
              </p>

              <a href="#" class="pix-btn banner-btn wow pixFadeUp" data-wow-delay="0.7s"
                  style="visibility: visible; animation-delay: 0.7s; animation-name: pixFadeUp;">
                   {{__('Get Started')}}
                </a>
              <!-- /.job-search-form-wrapper -->
          </div><!-- /.banner-content -->

          <div class="promo-mockup wow pixFadeUp text-center" data-wow-delay="0.9s"
              style="visibility: visible; animation-delay: 0.9s; animation-name: pixFadeUp;">
              <img src="{{ asset('storage/' . $slider->photo) }}" alt="">
          </div><!-- /.promo-mockup -->
      </div><!-- /.container -->
  </section>
