@php

date_default_timezone_set('Asia/Singapore');

// $info = getdate();
// $time = $info['hours'] . ":" .$info['minutes'] . ":" .$info['seconds'];

$host = '15.235.186.161';
$ports = [
    ['port' => 6900, 'name' => 'char', 'status' => 'inactive'],
    ['port' => 6121, 'name' => 'map', 'status' => 'inactive'],
    ['port' => 6900, 'name' => 'login', 'status' => 'inactive']
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

<header>
    <nav class="bg-orange-50 px-4 lg:px-6 py-1 border-b-2 border-orange-200">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <a href="/" class="flex items-center">
                <img src="images/poring.png" class="mr-2 h-5 sm:h-20" alt="Ragnarok Old World Logo" />
                <span class="self-center text-3xl font-bold whitespace-nowrap dark:text-white"><span class="text-lime-600">R</span><span class="text-rose-600">O</span><span class="text-yellow-600">W</span></span>
            </a>

            <div class="flex items-center lg:order-2">
                <a href="#" class="font-medium rounded-lg text-sm mr-3 px-3 bg-sky-500 hover:bg-sky-700 py-1 text-white rounded">CASH IN <i class="ml-3 fa-solid fa-sack-dollar"></i></a>
                <a href="#" class="font-medium rounded-lg text-sm px-3 bg-sky-500 hover:bg-sky-700 py-1 text-white rounded">CASH OUT <i class="ml-3 fa-regular fa-money-bill-1"></i></a>
            </div>

            <div class="justify-between items-center w-full lg:flex lg:w-auto lg:order-1">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <a href="#" 
                            class="mb-3 sm:mb-0 block py-1 px-2 text-sm text-white rounded bg-emerald-700">PLAYERS ONLINE: @php echo DB::table('char')->where('online', 1)->count(); @endphp</a>
                    </li>
                    <li>
                        <a href="#" 
                            class="block py-1 px-2 text-sm text-white rounded bg-amber-400">SERVER TIME: <span class="time">{{ now()->format('g:i:s A') }}</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <nav class="bg-transparent px-4 lg:px-6 py-1 mt-3">
        <div class="flex justify-center">

            <div class="content-center items-center w-full lg:flex lg:w-auto">
                <ul class="flex flex-col mt-2 sm:mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    @foreach ($ports as $port)
                        <li>
                            <a href="#" 
                                class="mb-3 sm:mb-0 ring-offset-2 ring-2 block py-1 px-2 text-sm text-white rounded {{ $port['status'] == 'active' ? 'ring-emerald-300 bg-emerald-400' : 'ring-red-300 bg-red-400' }}">{{ strtoupper($port['status']) }} {{ strtoupper($port['name']) }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </nav>

</header>