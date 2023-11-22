<x-mail::message>
# Olá

Conseguimos uma pessoa qualificada para a vaga que você cadastrou. Clique no botão e veja todas as informações!

<x-mail::button :url="''">
Informações
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
