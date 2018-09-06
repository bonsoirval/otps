@extends('layouts.alumni')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Alumni Dashboard</div>

                <div class="panel-body">
                    @component('components.alumni_nav')
                    @endcomponent

                    @component('components.who')
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
