@extends('layouts.front.app')


@section('content')
<!-- start Main Wrapper -->
<div class="main-wrapper scrollspy-container">

    <div class="breadcrumb-wrapper">
    
        <div class="container">
            
            <h1 class="page-title">IDStack</h1>
            
            <div class="row">
            
                <div class="col-xs-12 col-sm-8">
                    <ol class="breadcrumb">
                        <li><a href="#">Beranda</a></li>
                        <li class="active">Tentang Kami</li>
                    </ol>
                </div>
                
                <div class="col-xs-12 col-sm-4 hidden-xs">
                    {{--  <p class="hot-line"> <i class="fa fa-phone"></i> Hot Line: 1-222-33658</p>  --}}
                </div>
                
            </div>
            
        </div>

    </div>
    
    <div class="container pt-60 pb-70">
        
        <div class="row">
            
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
            
                <div class="section-title">
                    <h2 class="text-center">IDStack</h2>
                    <p>Media belajar dan berbagi bersama dalam berbagai bidang yang disuka. <strong>IDStack</strong> tidak membatasi hal itu</p>
                </div>
                
            </div>
            
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            
                <p>IDStack merupakan sebuah platform dimana teman-teman dapat belajar berbagai hal, juga dapat berbagi pengetahuan yang teman-teman miliki.</p>
                <p>Tak perlu khawatir, teman-teman dapat mulai belajar dan berbagi di manapun dan kapanpun. Karena, teman-teman belajar melalui interaksi secara visual.</p>
                <p>Platform masih dalam pengembangan. Adapun saran dan kritik yang membangun, bisa hubungi kami melalui fanspage atau kontak yang tertera.</p>
            
            </div>

        </div>
        
    </div>
    
</div>
<!-- end Main Wrapper -->
@endsection