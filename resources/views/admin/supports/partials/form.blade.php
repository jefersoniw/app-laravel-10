@csrf

<x-alert />

<a href="{{ route('supports.index') }}"
    class="my-4 py-2 px-4 rounded inline-flex items-center shadow focus:shadow-outline focus:outline-none text-purple-400 hover:text-purple-800 font-bold rounded">
    <i class="fa fa-arrow-left" aria-hidden="true"></i>
    Voltar
</a>

<input type="text" placeholder="assunto" name="subject" value="{{ $support->subject ?? old('subject') }}"
    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
<textarea name="body" id="body" cols="30" rows="5" placeholder="descrição"
    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">{{ $support->body ?? old('body') }}
</textarea>

@if (!empty($support))
    <button type="submit"
        class="py-2 px-4 rounded inline-flex items-center shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-5 rounded">
        <i class="fa fa-refresh" aria-hidden="true"></i>
        <span class="inline-block align-baseline">Atualizar</span>
    </button>
    <a href="{{ route('supports.delete', $support->id) }}"
        class="py-2 px-4 rounded inline-flex items-center shadow focus:shadow-outline focus:outline-none text-white hover:text-white bg-red-500 hover:bg-red-400 font-bold py-2 px-4 rounded">
        <i class="fa fa-trash-o" aria-hidden="true"></i> Excluir
    </a>
@else
    <button type="submit"
        class="py-2 px-4 rounded inline-flex items-center shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-5 rounded">
        <i class="fa fa-check" aria-hidden="true"></i>
        <span class="inline-block align-baseline">Enviar</span>
    </button>
@endif
