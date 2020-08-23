@extends('layouts.app')

@section('page_title', 'Pemberitahuan')

@section('content')
	<x-breadcrumb :links="$breadcrumb" size="md"/>
	<x-card-medium>
		<x-title>Pemberitahuan</x-title>

		@foreach ($notifications as $notification)
			<div>
				@if ($notification->status == 'unread')
					<span class="badge badge-primary">Baru</span>
				@endif

				<a href="{{ route('notifications.open', ['notification' => $notification]) }}" class="text-dark">
					{{ $notification->show() }}
				</a>
			</div>
			<div>
				<small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
			</div>
			<hr>
		@endforeach

		{{ $notifications->links() }}
	</x-card-medium>
@endsection
