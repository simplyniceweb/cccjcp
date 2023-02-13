<x-layout>
    <div class="flex justify-center mt-10 relative z-20">
        <img src="images/front.png" alt="">
        <div class="ro-name absolute bottom-5 center drop-shadow-lg">
            <h2 class="text-2xl sm:text-5xl font-bold uppercase drop-shadow-lg text-white">Ragnarok Old World</h2>
        </div>
    </div>

    <div class="flex justify-center relative z-10 -mt-7">
        <div class="bg-white p-3 rounded w-full">
            <div class="sm:grid sm:grid-cols-3 gap-4">
                <div><img src="images/classes.jpg" class="rounded my-3" alt="classes"></div>
                <div class="grid grid-rows-3 drop-shadow-md">
                    <a href="https://www.facebook.com/gaming/oldworldro" class="w-full font-semibold drop-shadow-md bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-r hover:from-blue-500 hover:to-cyan-500 rounded p-2 my-3 text-white">FACEBOOK PAGE <i class="fa-brands fa-facebook float-right"></i></a>
                    <a href="https://discord.com/invite/BXdwjapBBh" class="w-full font-semibold drop-shadow-md bg-gradient-to-r from-pink-500 to-red-500 hover:bg-gradient-to-r hover:from-red-500 hover:to-pink-500 rounded p-2 my-3 text-white">JOIN DISCORD <i class="fa-brands fa-discord float-right"></i></a>
                    <a href="" class="w-full font-semibold drop-shadow-md bg-gradient-to-r from-lime-500 to-green-500 hover:bg-gradient-to-r hover:from-green-500 hover:to-lime-500 rounded p-2 my-3 text-white">DOWNLOAD FULL CLIENT <i class="fa-solid fa-gamepad float-right"></i></a>
                </div>
                <div class="p-3">
                    @auth
                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                            <div class="flex">
                                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                                <div>
                                    <p class="font-bold mt-1">Welcome, {{ strtoupper(auth()->user()->userid) }}!</p>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-rows-2">
                            <a href="{{ route('logout') }}" onClick="return confirm('Are you sure want to logout?')" class="w-full font-semibold drop-shadow-md bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-r hover:from-blue-500 hover:to-cyan-500 rounded p-2 my-3 text-white">LOGOUT OF ROW <i class="float-right fa-solid fa-right-from-bracket"></i></a>
                            
                            {{-- <button type="button" class="h-10 bg-gradient-to-r from-pink-500 to-red-500 hover:bg-gradient-to-r hover:from-red-500 hover:to-pink-500 rounded font-semibold text-left px-2 text-white text-sm">EDIT PROFILE <i class="float-right fa-solid fa-user-pen"></i></button> --}}
                        </div>
                    @else
                        @include("security.login")
                    @endauth
                </div>
            </div>
            
            @if (session('message'))
                <hr class="my-2">

                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                    <div class="flex">
                        <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                        <div>
                            <p class="font-bold">Message</p>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @auth
                @include('security.profile')
            @endauth
            
            <hr class="my-2">

            @auth
                <div class="block">
                    <h3 class="text-2xl font-bold mb-0">Manage Characters</h3>
                </div>
                @include('tables.characters')
                <hr class="my-5">
            @endauth

            <div class="grid grid-cols-3 mt-2">
                <form action="" class="w-full">
                    <div class="flex">
                        <select name="type" id="type" class="mr-3 border placeholder:text-sky-400 text-sky-400 text-sm border-sky-300 rounded outline outline-transparent p-2 mb-3">
                            <option value="item" {{ request()->input('type') == 'item' ? 'selected' : '' }}>Item</option>
                            <option value="monster" {{ request()->input('type') == 'monster' ? 'selected' : '' }}>Monster</option>
                        </select>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search" class="border placeholder:text-sky-400 text-sky-400 text-sm border-sky-300 rounded outline outline-transparent p-2 mb-3" id="">
                    </div>
                </form>
            </div>

            @if ($type == 'item')
                @include('tables.items')
            @else
                @include('tables.monsters')
            @endif

            @if (count($results))
                {{ $results->links() }}
            @endif
        </div>
    </div>

    @include('security.registration')
</x-layout>