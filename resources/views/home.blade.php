@extends('layouts.app')

@section('content')
	<div class="container">
			@if(Auth::user()->hasRole('admin'))
					<div>Acceso como administrador</div>
			@else
			<div>Acceso usuario</div>
			@endif
	</div>
@endsection
