<div class="max-w-screen-lg px-10 py-6 mx-4 mt-20 mb-6 bg-white shadow md:mx-auto border-1">
    <div class="flex flex-col items-start w-full m-auto sm:flex-row">
        <div class="flex mx-auto sm:mr-10 sm:m-0">
        <div class="items-center justify-center w-20 h-20 m-auto mr-4 sm:w-32 sm:h-32">
            <img alt="profil"
            src="{{ $user->getImageURL() }}"
            class="object-cover w-20 h-20 mx-auto rounded-full sm:w-32 sm:h-32" />
        </div>
        </div>
        <div class="flex flex-col pt-4 mx-auto my-auto sm:pt-0 sm:mx-0">
        <div class="flex flex-col mx-auto sm:flex-row sm:mx-0 ">
            <h2 class="flex pr-4 text-xl font-light text-gray-900 sm:text-3xl">{{ $user->name }}</h2>
            <div class="flex">
            @auth
            @if (Auth::id() != $user->id)
                <a class="flex items-center px-1 text-sm font-medium text-gray-900 bg-transparent border border-gray-600 rounded outline-none sm:ml-2 hover:bg-blue-600 hover:text-white focus:outline-none hover:border-blue-700">
                    Follow</a>
            @elseif (Auth::id() === $user->id)
                <a class="p-1 ml-2 text-gray-700 border-transparent rounded-full cursor-pointer hover:text-blue-600 focus:outline-none focus:text-gray-600"
                aria-label="Notifications">
                <svg class="w-4 h-4 sm:w-8 sm:h-8" fill="none" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24">
                    <path
                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                </a>
                <a class="flex items-center px-1 text-sm font-medium text-gray-900 bg-transparent border border-gray-600 rounded outline-none sm:ml-2 hover:bg-blue-600 hover:text-white focus:outline-none hover:border-blue-700" href="{{ route('users.edit', $user->id)}}">
                    Edit profile
                </a>
            @endif
            @endauth
            </div>
        </div>
        <div class="flex items-center justify-between mt-3 space-x-2">
            <div class="flex"><span class="mr-1 font-semibold">{{ $user->threads()->count() }} </span> Post</div>
            <div class="flex"><span class="mr-1 font-semibold">20</span> Following</div>
            <div class="flex"><span class="mr-1 font-semibold">{{ $user->comments()->count() }}</span> Comments</div>
        </div>
        </div>
    </div>
    <div class="w-full pt-5">
        <h1 class="text-lg font-semibold text-gray-800 sm:text-xl">{{ $user->name }}</h1>
        <p class="text-sm text-gray-500 md:text-base">Fotografer</p>
        <p class="text-sm text-gray-800 md:text-base">{{ $user->bio }}</p>
    </div>
</div>
