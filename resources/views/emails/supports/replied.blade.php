<x-mail::message>
    # Dúvida respondida

    Resposta da dúvida {{ $reply->content }}

    <x-mail::button :url="route('replies.index', $reply->support_id)">
        Ver
    </x-mail::button>

    Obrigado,
    {{ config('app.name') }}
</x-mail::message>
