<h3 class="text-2xl font-semibold my-3">Change password</h3>
<form class="grid grid-rows-3 gap-y-2" action="{{ route('change.password') }}" method="POST">
    @csrf
    <div>
        <label for="profpassword" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
        <input type="password" name="password" id="profpassword" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder:text-sky-400 text-sky-400 text-sm border-sky-300 outline outline-transparent" required>
        @error('password')
            <p class="text-xs text-red-500">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="profpassword_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
        <input type="password" name="password_confirmation" id="profpassword_confirmation" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder:text-sky-400 text-sky-400 text-sm border-sky-300 outline outline-transparent" required>
        @error('password_confirmation')
            <p class="text-xs text-red-500">{{ $message }}</p>
        @enderror
    </div>
    <div class="block">
        <button type="submit" class="float-right h-10 bg-sky-500 hover:bg-sky-700 rounded font-semibold text-white text-sm w-1/6">UPDATE</button>
    </div>
</form>