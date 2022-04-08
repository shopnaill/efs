@extends('layouts.app')
<style>
    .swiper-slide {
        width: 200px!important;
        height: 200px!important;
    }

    .swiper-slide img {
        width: 100%;
        height: 100%;
        object-fit:  cover;
    }
</style>
@section('content')     
    @include('about.section')
    @include('client.section')
    @include('service.section')    
    @include('work.section')
    @include('contact.modal')
@endsection

@section('scripts')
    <script src="{{ asset('js/swiper.min.js') }}"></script>
 <script>
      var swiper = new Swiper('.swiper', {
        slidesPerView: 3,
        direction: getDirection(),
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
         

        on: {
          resize: function () {
            swiper.changeDirection(getDirection());
          },
        },
      });

      function getDirection() {
        var windowWidth = window.innerWidth;
        var direction = window.innerWidth <= 760 ? 'vertical' : 'horizontal';

        return direction;
      }
    </script>
@endsection