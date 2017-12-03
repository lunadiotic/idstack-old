@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('admin.subject.index') }}" class="btn btn-primary btn-xs">Subject</a>
                    <a href="{{ route('admin.software.index') }}" class="btn btn-primary btn-xs">Software</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
