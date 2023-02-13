@php
    $users = DB::table('char')->where('account_id', auth()->user()->account_id)->get();
@endphp
<table class="mb-3 mt-3 w-full border-collapse border border-slate-400 overflow-x-scroll sm:overflow-auto">
    <thead class="text-left">
        <tr class="hidden sm:table-row">
            <th class="border border-slate-300 p-2"></th>
            <th class="border border-slate-300 p-2">ID</th>
            <th class="border border-slate-300 p-2">Name</th>
            <th class="border border-slate-300 p-2">Sex</th>
            <th class="border border-slate-300 p-2">Class</th>
            <th class="border border-slate-300 p-2">Base Lvl</th>
            <th class="border border-slate-300 p-2">Job Lvl</th>
            <th class="border border-slate-300 p-2">Last Log</th>
            <th class="border border-slate-300 p-2"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr class="flex flex-col flex-no wrap sm:table-row">
            <td class="border border-slate-300 p-2"><img src="https://ratemyserver.net/skill_chars/j{{$user->class}}_{{ strtolower($user->sex) }}_stand.gif" class="w-9" alt=""></td>
            <td class="border border-slate-300 p-2 text-right sm:text-left"><span class="text-left inline-block font-semibold sm:hidden mr-2 uppercase">ID:</span>{{ $user->char_id }}</td>
            <td class="border border-slate-300 p-2 text-right sm:text-left"><span class="text-left inline-block font-semibold sm:hidden mr-2 uppercase">Name:</span>{{ $user->name ?: 'n/a' }}</td>
            <td class="border border-slate-300 p-2 text-right sm:text-left"><span class="text-left inline-block font-semibold sm:hidden mr-2 uppercase">Sex:</span>{{ $user->sex ?: 'n/a' }}</td>
            <td class="border border-slate-300 p-2 text-right sm:text-left"><span class="text-left inline-block font-semibold sm:hidden mr-2 uppercase">Class:</span>{{ $user->class ?: 'n/a' }}</td>
            <td class="border border-slate-300 p-2 text-right sm:text-left"><span class="text-left inline-block font-semibold sm:hidden mr-2 uppercase">Base Lvl:</span>{{ $user->base_level ?: 'n/a' }}</td>
            <td class="border border-slate-300 p-2 text-right sm:text-left"><span class="text-left inline-block font-semibold sm:hidden mr-2 uppercase">Job Lvl:</span>{{ $user->job_level ?: 'n/a' }}</td>
            <td class="border border-slate-300 p-2 text-right sm:text-left"><span class="text-left inline-block font-semibold sm:hidden mr-2 uppercase">Last Log:</span>{{ $user->last_login ?: 'n/a' }}</td>
            <td class="border border-slate-300 p-2" x-data="{ action: false }">
                <button x-on:click="action = ! action" id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Actions <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                <div x-show="action" id="dropdown" class="z-10 bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700" style="display: none">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                      <li>
                        <a onClick="return confirm('Are you sure want to reset character position?')" href="{{ route('reset.position', $user->char_id) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reset Position?</a>
                      </li>
                      <li>
                        <a onclick="return confirm('Are you sure want to reset character look?')" href="{{ route('reset.look', $user->char_id) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reset Look?</a>
                      </li>
                    </ul>
                </div>
                {{-- <a onClick="return confirm('Are you sure want to reset character position?')" href="{{ route('reset.position', $user->char_id) }}" class="bg-red-400 block px-1 font-semibold uppercase rounded text-white mb-3">Reset Position?</button> --}}
                {{-- <a onclick="return confirm('Are you sure want to reset character look?')" href="{{ route('reset.look', $user->char_id) }}" class="bg-red-400 block px-1 font-semibold uppercase rounded text-white">Reset Look?</a> --}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>