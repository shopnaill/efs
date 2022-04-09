<section id="brand-logo mt-3">
    <div class="section-title style-two text-center">
        <h2 class="title wow pixFadeUp">
            {{__('Our Clients')}}
        </h2>
    </div>
    <div class="container">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="2093px" height="1290px" class="devaider">
				<path fill-rule="evenodd" stroke="rgb(113, 86, 251)" stroke-width="2px" stroke-linecap="butt" stroke-linejoin="miter" opacity="0.302" fill="none" d="M2090.938,29.403 C2008.273,81.128 1967.117,-147.023 1815.004,206.381 C1690.211,496.313 1614.987,697.559 1352.115,681.324 C1089.708,665.117 947.988,515.661 751.258,709.320 C554.529,902.979 669.232,1016.994 246.379,1059.277 C-176.473,1101.561 90.749,1167.786 42.428,1287.250 "></path>
			</svg>
        <div class="swiper-container">
                   <div class="swiper">
            <div class="swiper-wrapper">
                @foreach($clients as $client)
                <div class="swiper-slide">
                    <div class="brand-logo">
                        <img src="{{ asset('storage/'.$client->logo) }}" alt="{{ $client->name }}">
                    </div>
                </div>
                @endforeach
                
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div> 
        </div>

    </div>
    <!-- /.container -->

</section>
