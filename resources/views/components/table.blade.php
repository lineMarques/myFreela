@props([
'freelas'=>$slot,
'invites'=>[],
'colunas' =>null,
'linhas' =>null,
'thRow'=>null
])
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                {{$colunas}}
            </tr>
        </thead>
        @foreach ($freelas as $freela)
        <tbody>
            <tr
                class="bg-gray-50 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                <x-th>{{$thRow}}</x-th>
                {{$linhas}}

            </tr>
        </tbody>
        @endforeach

    </table>
</div>
