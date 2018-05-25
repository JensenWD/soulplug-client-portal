@component('mail::message')
# Congratulations! Your item sold

@component('mail::panel', ['url' => ''])
    Your item {{ $item->name }} sold on <strong>{{ \Carbon\Carbon::parse($item->sold_on)->format('M d, Y') }}</strong> at Soul Plug!

    Any further questions message us at info@soul-plug.com
@endcomponent

Thanks,
<br>
SOUL PLUG TEAM
@endcomponent
