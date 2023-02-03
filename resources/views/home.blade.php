@php
    $host = '15.235.186.161';
    $ports = [
        ['port' => 6900, 'name' => 'char', 'status' => 'inactive'],
        ['port' => 6121, 'name' => 'char', 'status' => 'inactive'],
        ['port' => 6900, 'name' => 'char', 'status' => 'inactive']
    ];

    foreach ($ports as $key => $port)
    {
        $connection = @fsockopen($host, $port['port']);
        if (is_resource($connection))
        {
            $ports[$key]['status'] = 'active';

            fclose($connection);
        }
    }
@endphp

@foreach ($ports as $port)
    @if ($port['status'] == 'inactive')
        <div class="text-white rounded bg-red-400">INACTIVE</div>
        @else
        <div class="text-white rounded bg-emerald-400">ACTIVE</div>
    @endif
@endforeach
@foreach ($users as $user)
    <p>Email: {{ $user->email }}</p>
@endforeach

Online: {{ $count }}