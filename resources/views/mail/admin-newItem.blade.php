@component('mail::message')
### {{ $user->name }} has added a new item for consignment

@component('mail::button', ['url' => route('admin-portal')])
Review this item
@endcomponent
@endcomponent
