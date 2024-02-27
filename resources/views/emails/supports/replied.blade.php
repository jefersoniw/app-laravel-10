<x-mail::message>
    # Dúvida respondida

    O assunto da dúvida {{ $reply->support['subject'] }} foi respondida com {{ $reply->content }}

    <x-mail::button :url="route('replies.index', $reply->support_id)">
        Ver
    </x-mail::button>

    Obrigado,
    {{ config('app.name') }}
</x-mail::message>
