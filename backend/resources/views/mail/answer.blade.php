@component('mail::message')
# Survey on board. 

<<<<<<< HEAD
This email has been received because you have applied to complete your survey for later. Worry not, your incomplete survey has been saved.
=======
This email has been recived because you have applied to complete your survey for later. Your incomplete survey has been saved.
>>>>>>> 494233f53f0a594c45333f7cd3f2060b1a2f84d8

To complete your survey, click the button below to resume from where you have stopped.

@component('mail::button', ['url' => $url])
Complete survey.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent