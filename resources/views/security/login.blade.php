<form class="block lg:grid lg:grid-rows-4 gap-y-2" action="{{ route('login.authenticate') }}" method="POST">
    @csrf
    <div class="block">
        <input type="text" name="userid" id="userid" value="{{ old('userid') }}" placeholder="Username" class="border placeholder:text-sky-400 text-sky-400 text-sm border-sky-300 rounded outline outline-transparent p-2 mb-3 w-full">
        @error('userid')
            <p class="text-xs text-red-500">{{ $message }}</p>
        @enderror
    </div>
    <div class="block">
        <input type="password" name="user_pass" id="password" placeholder="Password" class="border placeholder:text-sky-400 text-sky-400 text-sm border-sky-300 rounded outline outline-transparent p-2 mb-3 w-full">
        @error('user_pass')
            <p class="text-xs text-red-500">{{ $message }}</p>
        @enderror
    </div>
    <div class="block lg:inline-flex">
        <button type="submit" class="mb-3 sm:mb-0 h-10 bg-sky-500 hover:bg-sky-700 rounded font-semibold text-white text-sm w-full lg:w-44">LOGIN</button>
        <button type="button" id="signupbtn" x-on:click="open = ! open" class="h-10 mt-3 lg:mt-0 lg:ml-8 bg-emerald-500 hover:bg-emerald-700 text-center rounded font-semibold text-white text-sm w-full lg:w-44">SIGN UP</button>
    </div>
    <button type="button" id="forgotpassbtn" x-on:click="forgot = ! forgot" class="mt-3 lg:mt-0 w-full h-10 bg-red-500 hover:bg-red-700 text-center rounded font-semibold text-white text-sm">FORGOT PASSWORD?</button>
</form>