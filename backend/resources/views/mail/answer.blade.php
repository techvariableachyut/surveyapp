@component('mail::message')
# Survey on board. 

This email has been received because you have applied to complete your survey for later. Worry not, your incomplete survey has been saved.

To complete your survey, click the button below to resume from where you have stopped.

@component('mail::button', ['url' => $url])
Complete survey.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent