@extends('layouts.app')

@section('content')
<div class="container">
    <dashboard-component></dashboard-component>
    <network-connection-component user="{{Auth::user()}}"></network-connection-component>
    </div>
</div>
@endsection

