  <!--==========================-->
  <!--=         Work        =-->
  <!--==========================-->
  <div class="section inspect">
      <div class="container">
          <div class="section-title color-two text-center">
              <h2 class="title wow pixFadeUp" data-wow-delay="0.3s"
                  style="visibility: visible; animation-delay: 0.3s; animation-name: pixFadeUp;">
                    {{__('Our Work')}}
              </h2>

              <p class="wow pixFadeUp" data-wow-delay="0.5s"
                  style="visibility: visible; animation-delay: 0.5s; animation-name: pixFadeUp;">
                    {{__('We are a team of passionate designers and developers that works hard to create high quality web apps and user interfaces with the latest technologies.')}}
              </p>
          </div>

          <div class="row">
              <div class="traking--images">
                  @foreach ($works as $key => $work)
                    
                          <div class="traking__item traking__item--width-one mt-20">
                              <img src="{{ asset('storage/' . $work->photo) }}" alt="{{ $work->name }}"
                                  class="wow fadeInUp" data-wow-delay="0.5s" alt="sasspik traking"
                                  style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                              
                          </div>
                   @endforeach

              </div>
              <!-- /.traking-images -->
          </div>
      </div>
      <!-- /.container -->
  </div>
  <!-- /.section inspect -->
