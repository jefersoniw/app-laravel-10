@csrf

<x-alert />

<input type="text" placeholder="assunto" name="subject" value="{{ $support->subject ?? old('subject') }}"
    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
<textarea name="body" id="body" cols="30" rows="5" placeholder="descrição"
    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">{{ $support->body ?? old('body') }}
</textarea>

<a href="{{ route('supports.index') }}"
    class="py-2 px-4 rounded inline-flex items-center shadow focus:shadow-outline focus:outline-none text-purple-400 hover:text-purple-800 font-bold py-2 px-4 rounded">

    <svg class="fill-current w-4 h-4 mr-2" width="64px" height="64px" viewBox="-2.4 -2.4 28.80 28.80" fill="none"
        xmlns="http://www.w3.org/2000/svg" stroke="#000000" transform="matrix(1, 0, 0, 1, 0, 0)">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier">
            <rect width="24" height="24" fill="white"></rect>
            <path d="M14.5 17L9.5 12L14.5 7" stroke="#000000" stroke-linecap="round" stroke-linejoin="round"></path>
        </g>
    </svg>

    Voltar
</a>

<button type="submit"
    class="py-2 px-4 rounded inline-flex items-center shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-5 rounded">

    <svg class="fill-current w-4 h-4 mr-2" width="64px" height="64px" viewBox="-1.2 -1.2 26.40 26.40" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <g id="SVGRepo_bgCarrier" stroke-width="0" transform="translate(0,0), scale(1)">
            <rect x="-1.2" y="-1.2" width="26.40" height="26.40" rx="0" fill="#080808" strokewidth="0"></rect>
        </g>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier">
            <rect width="24" height="24" fill="white"></rect>
            <path d="M5 13.3636L8.03559 16.3204C8.42388 16.6986 9.04279 16.6986 9.43108 16.3204L19 7" stroke="#000000"
                stroke-linecap="round" stroke-linejoin="round"></path>
        </g>
    </svg>

    <span class="inline-block align-baseline">Enviar</span>
</button>
