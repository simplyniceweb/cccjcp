<x-layout>
    <div class="flex justify-center mt-10 relative z-20">
        <img src="images/front.png" alt="">
        <div class="ro-name absolute bottom-5 center drop-shadow-lg">
            <h2 class="text-5xl font-bold uppercase drop-shadow-lg text-white">Ragnarok Old World</h2>
        </div>
    </div>

    <div class="flex justify-center relative z-10 -mt-7">
        <div class="bg-white p-3 rounded w-full">
            <div class="grid grid-cols-3 gap-4">
                <div><img src="images/classes.jpg" class="rounded my-3" alt="classes"></div>
                <div class="grid grid-rows-3 drop-shadow-md">
                    <a href="" class="w-full font-semibold drop-shadow-md bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-r hover:from-blue-500 hover:to-cyan-500 rounded p-2 my-3 text-white">FACEBOOK PAGE <i class="fa-brands fa-facebook float-right"></i></a>
                    <a href="" class="w-full font-semibold drop-shadow-md bg-gradient-to-r from-pink-500 to-red-500 hover:bg-gradient-to-r hover:from-red-500 hover:to-pink-500 rounded p-2 my-3 text-white">JOIN DISCORD <i class="fa-brands fa-discord float-right"></i></a>
                    <a href="" class="w-full font-semibold drop-shadow-md bg-gradient-to-r from-lime-500 to-green-500 hover:bg-gradient-to-r hover:from-green-500 hover:to-lime-500 rounded p-2 my-3 text-white">DOWNLOAD FULL CLIENT <i class="fa-solid fa-gamepad float-right"></i></a>
                </div>
                <div class="p-3">
                    @auth
                        <p class="text-xl uppercase font-bold text-gray-500">Welcome to <span class="text-lime-600">R</span><span class="text-rose-600">O</span><span class="text-yellow-600">W</span> {{ auth()->user()->userid }}!</p>
                        <hr>
                        <div class="grid grid-rows-2">
                            <a href="{{ route('logout') }}" onClick="return confirm('Are you sure want to logout?')" class="w-full font-semibold drop-shadow-md bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-r hover:from-blue-500 hover:to-cyan-500 rounded p-2 my-3 text-white">LOGOUT OF ROW <i class="float-right fa-solid fa-right-from-bracket"></i></a>
                        </div>
                    @else
                            <form class="grid grid-rows-4 gap-y-2" action="{{ route('login.authenticate') }}" method="POST">
                                @csrf
                                <div class="grid grid-rows">
                                    <input type="text" name="userid" id="userid" value="{{ old('userid') }}" placeholder="Username" class="border placeholder:text-sky-400 text-sky-400 text-sm border-sky-300 rounded outline outline-transparent p-2 mb-3">
                                    @error('userid')
                                        <p class="text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="grid grid-rows">
                                    <input type="password" name="user_pass" id="password" placeholder="Password" class="border placeholder:text-sky-400 text-sky-400 text-sm border-sky-300 rounded outline outline-transparent p-2 mb-3">
                                    @error('user_pass')
                                        <p class="text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="flex">
                                    <button type="submit" class="bg-sky-500 hover:bg-sky-700 rounded font-semibold text-white text-sm w-44">LOGIN</button>
                                    <button class="ml-8 bg-emerald-500 hover:bg-emerald-700 text-center rounded font-semibold text-white text-sm w-44">SIGN UP</button>
                                </div>
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-center rounded font-semibold text-white text-sm">FORGOT PASSWORD?</button>
                            </form>
                    @endauth
                </div>
            </div>
            
            <hr class="my-2">

            @auth
                <div class="grid grid-rows-2">
                    <h3>Manage Characters</h3>
                </div>
                @include('tables.characters')
            @endauth

            <div class="grid grid-cols-3 mt-2">
                <form action="" class="w-full">
                    <div class="flex">
                        <select name="type" id="" class="mr-3 border placeholder:text-sky-400 text-sky-400 text-sm border-sky-300 rounded outline outline-transparent p-2 mb-3">
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
</x-layout>