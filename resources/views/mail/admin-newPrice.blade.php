@component('mail::message')
# {{ $item->name }}(#{{ $item->id }}) has had it's price range updated to {{ $item->range }}
Done by: {{ $item->user()->first()->name }} on {{ \Carbon\Carbon::today()->toFormattedDateString() }}

You can reach them at: <a href="mailto:{{ $item->user()->first()->email }}">{{ $item->user()->first()->email }}</a> or {{ $item->user()->first()->phone }}

@component('mail::button', ['url' => route('admin-portal')])
Review this item
@endcomponent
@endcomponent
