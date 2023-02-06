<x-layout>
    <div class="flex justify-center mt-10 relative z-20">
        <img src="images/front.png" alt="">
        <div class="ro-name absolute bottom-5 center drop-shadow-lg">
            <h2 class="text-4xl text-white font-bold uppercase drop-shadow-lg">Ragnarok Old World</h2>
        </div>
    </div>

    <div class="flex justify-center relative z-10 -mt-7">
        <div class="bg-white p-3 rounded w-full">
            <div class="grid grid-cols-3 gap-4">
                <div><img src="images/classes.jpg" class="rounded-tl rounded-bl" alt="classes"></div>
                <div class="grid grid-rows-3 drop-shadow-md">
                    <a href="" class="w-full font-semibold drop-shadow-md bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-r hover:from-blue-500 hover:to-cyan-500 rounded p-2 my-3 text-white">DOWNLOAD FULL CLIENT</a>
                    <a href="" class="w-full font-semibold drop-shadow-md bg-gradient-to-r from-pink-500 to-red-500 hover:bg-gradient-to-r hover:from-red-500 hover:to-pink-500 rounded p-2 my-3 text-white">DOWNLOAD KRO CLIENT</a>
                    <a href="" class="w-full font-semibold drop-shadow-md bg-gradient-to-r from-lime-500 to-green-500 hover:bg-gradient-to-r hover:from-green-500 hover:to-lime-500 rounded p-2 my-3 text-white">DOWNLOAD SMALL CLIENT</a>
                </div>
                <div class="p-3">
                    <form class="grid grid-rows-2 gap-y-2" action="">
                        <input type="text" name="username" id="username" placeholder="Username" class="border placeholder:text-sky-400 text-sky-400 text-sm border-sky-300 rounded outline outline-transparent p-2 mb-3">
                        <input type="text" name="password" id="username" placeholder="Password" class="border placeholder:text-sky-400 text-sky-400 text-sm border-sky-300 rounded outline outline-transparent p-2 mb-3">
                        <div class="flex">
                            <button type="submit" class="bg-sky-500 hover:bg-sky-700 p-1 float-right rounded font-semibold text-white text-xl w-44">LOGIN</button>
                            <button type="submit" class="ml-8 bg-emerald-500 hover:bg-emerald-700 p-1 float-right rounded font-semibold text-white text-xl w-44">SIGN UP</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>