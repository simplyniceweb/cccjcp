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
                <div><img src="images/classes.jpg" class="rounded" alt="classes"></div>
                <div class="grid grid-rows-3 drop-shadow-md">
                    <a href="" class="w-full font-semibold drop-shadow-md bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-r hover:from-blue-500 hover:to-cyan-500 rounded p-2 my-3 text-white">FACEBOOK PAGE <i class="fa-brands fa-facebook float-right"></i></a>
                    <a href="" class="w-full font-semibold drop-shadow-md bg-gradient-to-r from-pink-500 to-red-500 hover:bg-gradient-to-r hover:from-red-500 hover:to-pink-500 rounded p-2 my-3 text-white">JOIN DISCORD <i class="fa-brands fa-discord float-right"></i></a>
                    <a href="" class="w-full font-semibold drop-shadow-md bg-gradient-to-r from-lime-500 to-green-500 hover:bg-gradient-to-r hover:from-green-500 hover:to-lime-500 rounded p-2 my-3 text-white">DOWNLOAD FULL CLIENT <i class="fa-solid fa-gamepad float-right"></i></a>
                </div>
                <div class="p-3">
                    <form class="grid grid-rows-2 gap-y-2" action="">
                        <input type="text" name="username" id="username" placeholder="Username" class="border placeholder:text-sky-400 text-sky-400 text-sm border-sky-300 rounded outline outline-transparent p-2 mb-3">
                        <input type="text" name="password" id="username" placeholder="Password" class="border placeholder:text-sky-400 text-sky-400 text-sm border-sky-300 rounded outline outline-transparent p-2 mb-3">
                        <div class="flex">
                            <button type="submit" class="bg-sky-500 hover:bg-sky-700 p-1 rounded font-semibold text-white text-xl w-44">LOGIN</button>
                            <button type="submit" class="ml-8 bg-emerald-500 hover:bg-emerald-700 p-1 rounded font-semibold text-white text-xl w-44">SIGN UP</button>
                        </div>
                        <button type="submit" class="bg-red-500 hover:bg-red-700 p-1 rounded font-semibold text-white text-sm">FORGOT PASSWORD?</button>
                    </form>
                </div>
            </div>
            
            <hr class="my-2">

            <div class="grid grid-cols-3 mt-2">
                <form action="" class="w-full">
                    <div class="flex">
                        <select name="type" id="" class="mr-3 border placeholder:text-sky-400 text-sky-400 text-sm border-sky-300 rounded outline outline-transparent p-2 mb-3">
                            <option value="item">Item</option>
                            <option value="monster">Monster</option>
                        </select>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search" class="border placeholder:text-sky-400 text-sky-400 text-sm border-sky-300 rounded outline outline-transparent p-2 mb-3" id="">
                    </div>
                </form>
            </div>

            <table class="mb-3 w-full border-collapse border border-slate-400">
                <thead class="text-left">
                    <tr>
                        <th class="border border-slate-300 p-2">Name</th>
                        <th class="border border-slate-300 p-2">Type</th>
                        <th class="border border-slate-300 p-2">Weight</th>
                        <th class="border border-slate-300 p-2">Attack</th>
                        <th class="border border-slate-300 p-2">Slots</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $result)
                    <tr>
                        <td class="border border-slate-300 p-2">{{ $result->name_english }}</td>
                        <td class="border border-slate-300 p-2">{{ $result->type }}</td>
                        <td class="border border-slate-300 p-2">{{ $result->weight }}</td>
                        <td class="border border-slate-300 p-2">{{ $result->attack }}</td>
                        <td class="border border-slate-300 p-2">{{ $result->slots }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @if (count($results))
                {{ $results->links() }}
            @endif
        </div>
    </div>
</x-layout>