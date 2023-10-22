<x-mail::message>
# Introduction

The body of your message.

<x-mail::button :url="'http://myfreela.test/dashboard'">
Clique aqui
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
