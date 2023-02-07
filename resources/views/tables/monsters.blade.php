<table class="mb-3 w-full border-collapse border border-slate-400">
    <thead class="text-left">
        <tr>
            <th class="border border-slate-300 p-2"></th>
            <th class="border border-slate-300 p-2">Name</th>
            <th class="border border-slate-300 p-2">Level</th>
            <th class="border border-slate-300 p-2">HP</th>
            <th class="border border-slate-300 p-2">Race</th>
            <th class="border border-slate-300 p-2">Element</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($results as $result)
        <tr>
            <td class="border border-slate-300 p-2"><img src="https://file5s.ratemyserver.net/mobs/{{ $result->ID }}.gif" class="w-9" alt=""></td>
            <td class="border border-slate-300 p-2">{{ $result->kName }}</td>
            <td class="border border-slate-300 p-2">{{ $result->LV ?: 'n/a' }}</td>
            <td class="border border-slate-300 p-2">{{ $result->HP ?: 'n/a' }}</td>
            <td class="border border-slate-300 p-2">{{ $result->Race ?: 'n/a' }}</td>
            <td class="border border-slate-300 p-2">{{ $result->Element ?: 'n/a' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>