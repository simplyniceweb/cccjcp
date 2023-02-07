@php
    $users = DB::table('char')->where('account_id', auth()->user()->account_id)->get();
@endphp
<table class="mb-3 mt-3 w-full border-collapse border border-slate-400">
    <thead class="text-left">
        <tr>
            <th class="border border-slate-300 p-2"></th>
            <th class="border border-slate-300 p-2">ID</th>
            <th class="border border-slate-300 p-2">Name</th>
            <th class="border border-slate-300 p-2">Sex</th>
            <th class="border border-slate-300 p-2">Class</th>
            <th class="border border-slate-300 p-2">Base Lvl</th>
            <th class="border border-slate-300 p-2">Job Lvl</th>
            <th class="border border-slate-300 p-2">Last Log</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td class="border border-slate-300 p-2"></td>
            <td class="border border-slate-300 p-2">{{ $user->char_id }}</td>
            <td class="border border-slate-300 p-2">{{ $user->name ?: 'n/a' }}</td>
            <td class="border border-slate-300 p-2">{{ $user->sex ?: 'n/a' }}</td>
            <td class="border border-slate-300 p-2">{{ $user->class ?: 'n/a' }}</td>
            <td class="border border-slate-300 p-2">{{ $user->base_level ?: 'n/a' }}</td>
            <td class="border border-slate-300 p-2">{{ $user->job_level ?: 'n/a' }}</td>
            <td class="border border-slate-300 p-2">{{ $user->last_login ?: 'n/a' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>