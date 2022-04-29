@extends('layouts.app')

@section('content')
	<div class="container">
			@if(Auth::user()->hasRole('admin'))
				<div>Acceso como administrador</div>
			@elseif (Auth::user()->hasRole('recluter'))
				<div>Acceso recluter</div>
			@else
				<div>Acceso developer</div>
			@endif
	</div>
@endsection
