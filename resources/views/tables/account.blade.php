<table class="mb-3 mt-3 w-full border-collapse border border-slate-400 overflow-x-scroll sm:overflow-auto">
    <thead class="text-left">
        <tr class="hidden sm:table-row">
            <th class="border border-slate-300 p-2"></th>
            <th class="border border-slate-300 p-2">ID</th>
            <th class="border border-slate-300 p-2">Name</th>
            <th class="border border-slate-300 p-2">Sex</th>
            <th class="border border-slate-300 p-2">Email</th>
            <th class="border border-slate-300 p-2">Last IP</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($results as $user)
        <tr class="flex flex-col flex-no wrap sm:table-row">
            <td class="border border-slate-300 p-2"><span class="inline-block font-semibold sm:hidden mr-2 uppercase">ID:</span>{{ $user->account_id }}</td>
            <td class="border border-slate-300 p-2"><span class="inline-block font-semibold sm:hidden mr-2 uppercase">Name:</span>{{ $user->userid ?: 'n/a' }}</td>
            <td class="border border-slate-300 p-2"><span class="inline-block font-semibold sm:hidden mr-2 uppercase">Sex:</span>{{ $user->sex ?: 'n/a' }}</td>
            <td class="border border-slate-300 p-2"><span class="inline-block font-semibold sm:hidden mr-2 uppercase">Class:</span>{{ $user->email ?: 'n/a' }}</td>
            <td class="border border-slate-300 p-2"><span class="inline-block font-semibold sm:hidden mr-2 uppercase">Last Log:</span>{{ $user->last_ip ?: 'n/a' }}</td>
            <td class="border border-slate-300 p-2 relative" x-data="{ acc_action: false }" @click.away="acc_action = false">
                <button x-on:click="acc_action = ! acc_action" id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">List of actions <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                <div x-show="acc_action" id="dropdown" class="absolute z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700" style="display: none">
                    <ul class="text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                      <li><a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" href="">Ban</a></li>
                      <li><a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" href="">Storage</a></li>
                    </ul>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>