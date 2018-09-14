@component('mail::message')
# Congratulations!

Your item <strong>{{ $item->name }}</strong> was sold! A payout will be initiated on regular Soul-Plug basis. If you wish to know more please contact us at
<a href="mailto:info@soul-plug.com">info@soul-plug.com</a>

@component('mail::button', ['url' => route('portal')])
Check portal status
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
