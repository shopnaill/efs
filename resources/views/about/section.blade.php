<div class="row no-gutters align-items-center mt-185">
    <div class="col-lg-4 col-md-6 offset-lg-1 pix-order-two-md">
        <div class="travel-download-content" {{ app()->getLocale() == 'ar' ? 'style=text-align:right;' : '' }}>
            <div class="section-title style-eight">
                <h2 class="title wow fadeInUp" data-wow-delay="0.3s"
                    style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                    {{ $about->getTitle() }}
                </h2>

                <p class="wow fadeInUp" data-wow-delay="0.5s"
                    style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                    {!! $about->getDescription() !!}
                </p>
            </div>
            <a href="#" class="app-btn-two app-travel wow flipInX" data-wow-delay="0.7s"
                style="visibility: visible; animation-delay: 0.7s; animation-name: flipInX;">
                <i class="fa fa-phone"></i>
                <span class="btn-text">
                    <span>
                        {{ __('Contact Us') }}
                    </span>
                </span>
            </a>
        </div>
        <!-- /.travel-download-content -->
    </div>
    <!-- /.col-md-4 -->

    <div class="col-lg-6 col-md-6 offset-lg-1">
        <div class="travel-parallax-image-two wow fadeInUp" data-wow-delay="0.3s"
            style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
            <div class="image-wrapper">
                <img src="{{ asset('storage/' . $about->photo) }}" alt="">

                <span class="circle-shape" data-parallax="{&quot;y&quot;: -50}"
                    style="transform:translate3d(0px, -26.588px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1); -webkit-transform:translate3d(0px, -26.588px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1); "></span>
            </div>
            <!-- /.image-wrapper -->
        </div>
        <!-- /.travel-parallax-image-two -->
    </div>
    <!-- /.col-md-5 offset-md-2 -->
</div>
