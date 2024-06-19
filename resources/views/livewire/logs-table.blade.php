<div class="relative overflow-x-auto" wire:poll.1000ms>
    <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
        <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Device
                </th>
                <th scope="col" class="px-6 py-3">
                    Created At
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
                <tr class="text-center bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-left text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $log->id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $log->user->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $log->device }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $log->created_at }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
