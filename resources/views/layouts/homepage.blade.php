@extends('master')

@section('body')
    {{--<div class="row">--}}
    {{--<div class="col-12 d-flex justify-content-center">--}}
    {{--<img src="{{ asset('img/soul_plug_logo.png') }}" class="img-fluid" alt="logo"--}}
    {{--style="max-width: 18rem;width:100%;height: 100%;">--}}
    {{--</div>--}}
    {{--</div>--}}

    <div class="row mt-5 mb-4">
        <div class="col-12">
            <div class="row h-100 align-items-lg-stretch">
                <div class="col-12 col-md-4 pb-4 pb-md-1 pr-3 pl-3">
                    <div class="card p-4 h-100 bg-dark text-white border-0 rounded">
                        <img class="card-img-top" data-src="holder.js/100%x180/" alt="">
                        <div class="card-block">
                            <h4 class="card-title font-weight-bold text-uppercase">Register</h4>
                            <p class="card-text"><a class="font-weight-bold" href="{{ route('register') }}">Sign up</a>
                                and then answer a few questions. Your new seller account is only a few clicks away from
                                approval.
                            </p>
                        </div>

                        <div class="arrow-right d-none d-md-block"></div>
                        <div class="arrow-down d-block d-md-none"></div>
                    </div>
                </div>

                <div class="col-12 col-md-4 pb-4 pb-md-1 pr-3 pl-3">
                    <div class="card p-4 h-100 bg-dark text-white border-0 rounded">
                        <img class="card-img-top" data-src="holder.js/100%x180/" alt="">
                        <div class="card-block">
                            <h4 class="card-title font-weight-bold text-uppercase">Submit</h4>
                            <p class="card-text">After creating your seller account you will be able to quickly and
                                easily submit your shoes for sale!</p>
                        </div>

                        <div class="arrow-right d-none d-md-block"></div>
                        <div class="arrow-down d-block d-md-none"></div>
                    </div>
                </div>

                <div class="col-12 col-md-4 pb-4 pb-md-1 pr-3 pl-3">
                    <div class="card p-4 h-100 bg-dark text-white border-0 rounded">
                        <img class="card-img-top" data-src="holder.js/100%x180/" alt="">
                        <div class="card-block">
                            <h4 class="card-title font-weight-bold text-uppercase">Ship or drop off</h4>
                            <p class="card-text">After submitting your shoes to our system you can either drop them off
                                in person, or ship them to us. Once we have your items checked for approval, they will
                                be listed for sale on our website and instore.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-10 offset-md-1 col-xl-6 offset-xl-3">
            @unless(Auth::check())
                @include('auth.login')
            @endunless
        </div>
    </div>


    {{--<div class="row pt-5 pb-5" style="">--}}
    {{--<div id="scene1" class="col-12 col-md-6">--}}
    {{--<img data-depth="0.6" src="{{ asset('img/yeezy2.png') }}" alt="" class="img-fluid">--}}
    {{--</div>--}}
    {{--<div class="parallax-move col-12 col-md-6">--}}
    {{--<h2>Heading will be here</h2>--}}
    {{--<p>Lorem ipsum dolor sit amet, etiam nonumy laudem eu qui, in eos simul aliquip tamquam, cu cum--}}
    {{--conceptam--}}
    {{--eloquentiam necessitatibus. Mel ex eius insolens iracundia. Ne eum intellegat assueverit, vel ut--}}
    {{--saepe--}}
    {{--ornatus principes. Mel summo mollis no, cu nec semper perpetua, definiebas omittantur per an. Cu--}}
    {{--facete--}}
    {{--iriure eos, ius eirmod hendrerit accommodare in. Ad elitr tibique similique cum, in vim exerci--}}
    {{--sapientem.</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row pt-5 pb-5">--}}
    {{--<div class="col-12 col-md-6">--}}
    {{--<h2>Heading will be here</h2>--}}
    {{--<p>Lorem ipsum dolor sit amet, etiam nonumy laudem eu qui, in eos simul aliquip tamquam, cu cum--}}
    {{--conceptam--}}
    {{--eloquentiam necessitatibus. Mel ex eius insolens iracundia. Ne eum intellegat assueverit, vel ut--}}
    {{--saepe--}}
    {{--ornatus principes. Mel summo mollis no, cu nec semper perpetua, definiebas omittantur per an. Cu--}}
    {{--facete--}}
    {{--iriure eos, ius eirmod hendrerit accommodare in. Ad elitr tibique similique cum, in vim exerci--}}
    {{--sapientem.</p>--}}
    {{--</div>--}}
    {{--<div id="scene2" class="col-12 col-md-6">--}}
    {{--<img data-depth="0.6" src="{{ asset('img/race.png') }}" alt="" class="img-fluid">--}}
    {{--</div>--}}
    {{--</div>--}}

@endsection

@push('scripts')
    <script>
        var scene = document.getElementById('scene1');
        var parallaxInstance = new Parallax(scene);
        var scene = document.getElementById('scene2');
        var parallaxInstance = new Parallax(scene);
    </script>
@endpush