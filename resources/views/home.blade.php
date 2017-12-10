@extends('layouts.back.app')

@section('content')
<div class="container-fluid">

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group pull-right m-t-15">
                <button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Settings</button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
                    <a class="dropdown-item" href="#">Dropdown One</a>
                    <a class="dropdown-item" href="#">Dropdown Two</a>
                    <a class="dropdown-item" href="#">Dropdown Three</a>
                    <a class="dropdown-item" href="#">Dropdown Four</a>
                </div>
            </div>

            <h4 class="page-title">Starter</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Ubold</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active">Starter</li>
            </ol>

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>Admin Panel</b></h4>
                <p class="text-muted m-b-30 font-14">
                    Menu Admin.
                </p>

                <h2>Admin Panel</h2>
            </div> <!-- end card-box -->
        </div><!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- container -->
@endsection
