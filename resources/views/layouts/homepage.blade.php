@extends('master')

@section('body')
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <img src="{{ asset('img/soul_plug_logo.png') }}" class="img-fluid" alt="logo"
                 style="max-width: 18rem;width:100%;height: 100%;">
        </div>
        <div class="col-12 text-center">
            <h1 class="text-uppercase mt-3">Client portal</h1>
        </div>
    </div>

    @unless(Auth::check())
        <div class="row mt-2 mb-4">
            @include('auth.login')
        </div>
    @endunless


    <div class="row pt-5 pb-5" style="">
        <div id="scene1" class="col-6">
            <img data-depth="0.6" src="{{ asset('img/yeezy2.png') }}" alt="" class="img-fluid">
        </div>
        <div class="parallax-move col-6">
            <h2>Heading will be here</h2>
            <p>Lorem ipsum dolor sit amet, etiam nonumy laudem eu qui, in eos simul aliquip tamquam, cu cum
                conceptam
                eloquentiam necessitatibus. Mel ex eius insolens iracundia. Ne eum intellegat assueverit, vel ut
                saepe
                ornatus principes. Mel summo mollis no, cu nec semper perpetua, definiebas omittantur per an. Cu
                facete
                iriure eos, ius eirmod hendrerit accommodare in. Ad elitr tibique similique cum, in vim exerci
                sapientem.</p>
        </div>
    </div>
    <div class="row pt-5 pb-5">
        <div class="col-6">
            <h2>Heading will be here</h2>
            <p>Lorem ipsum dolor sit amet, etiam nonumy laudem eu qui, in eos simul aliquip tamquam, cu cum
                conceptam
                eloquentiam necessitatibus. Mel ex eius insolens iracundia. Ne eum intellegat assueverit, vel ut
                saepe
                ornatus principes. Mel summo mollis no, cu nec semper perpetua, definiebas omittantur per an. Cu
                facete
                iriure eos, ius eirmod hendrerit accommodare in. Ad elitr tibique similique cum, in vim exerci
                sapientem.</p>
        </div>
        <div id="scene2" class="col-6">
            <img data-depth="0.6" src="{{ asset('img/race.png') }}" alt="" class="img-fluid">
        </div>
    </div>
    <div class="row pt-5 pb-5">
        <div id="scene3" class="col-6">
            <img data-depth="0.8" src="{{ asset('img/yeezy1.png') }}" alt="" class="img-fluid">
        </div>
        <div class="col-6">
            <h2>Heading will be here</h2>
            <p>Lorem ipsum dolor sit amet, etiam nonumy laudem eu qui, in eos simul aliquip tamquam, cu cum
                conceptam
                eloquentiam necessitatibus. Mel ex eius insolens iracundia. Ne eum intellegat assueverit, vel ut
                saepe
                ornatus principes. Mel summo mollis no, cu nec semper perpetua, definiebas omittantur per an. Cu
                facete
                iriure eos, ius eirmod hendrerit accommodare in. Ad elitr tibique similique cum, in vim exerci
                sapientem.</p>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        var scene = document.getElementById('scene1');
        var parallaxInstance = new Parallax(scene);
        var scene = document.getElementById('scene2');
        var parallaxInstance = new Parallax(scene);
        var scene = document.getElementById('scene3');
        var parallaxInstance = new Parallax(scene);
    </script>
@endpush