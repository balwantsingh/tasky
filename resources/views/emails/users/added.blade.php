@component('mail::message')
# {{ config('app.name') }} Account Registered

Welcome **{{ $user->name }}** your account has been created to our sites.

**Do login with these credentials**

@component('mail::table')
|   username            | email                | password                   |
|   -------------       |   :-------------:    |  -------------------:      |
|   {{ $user->name }}   |   {{ $user->email }} |    {{ __('Pa$$word') }}    |

@endcomponent

@component('mail::button', ['url' => config('app.url'), 'color' => 'success'])
Visit Website
@endcomponent

@component('mail::panel')
For changing the password visit the url [change password]({{ route('password.request') }}).
@endcomponent


Thanks,<br>
{{ config('app.name') }} Team

@component('mail::footer')
For changing the password visit the url [change password]({{ route('password.request') }}).
@endcomponent

@endcomponent

