<x-mail::message>
# Olá

Complemente a sua renda com o freela que surgiu. Clique no botão e veja todas as informações!

<x-mail::button :url="'http://myfreela.test/dashboard'">
Informações da vaga
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
