<x-mail::message>
# Hello {{ $name }},
## Ticket Number: {{ $ticket_number }}

Thank you for your contact submission. We have successfully received your inquiry!

<x-mail::button :url="url('/')">
    Visit Our Website
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>