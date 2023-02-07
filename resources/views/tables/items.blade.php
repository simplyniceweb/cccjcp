<table class="mb-3 w-full border-collapse border border-slate-400">
    <thead class="text-left">
        <tr>
            <th class="border border-slate-300 p-2"></th>
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
            <td class="border border-slate-300 p-2"><img src="https://file5s.ratemyserver.net/items/small/{{ $result->id }}.gif" class="w-9" alt=""></td>
            <td class="border border-slate-300 p-2">{{ $result->name_english }}</td>
            <td class="border border-slate-300 p-2">{{ $result->type ?: 'n/a' }}</td>
            <td class="border border-slate-300 p-2">{{ $result->weight ?: 'n/a' }}</td>
            <td class="border border-slate-300 p-2">{{ $result->attack ?: 'n/a' }}</td>
            <td class="border border-slate-300 p-2">{{ $result->slots ?: 'n/a' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>