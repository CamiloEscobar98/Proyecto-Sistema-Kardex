<div>
    <table class="w-full table-auto">
        <thead>
            <tr class="text-sm leading-normal text-gray-600 uppercase bg-gray-200 dark:bg-gray-600 dark:text-gray-100">
                <th>#</th>
                <th class="px-6 py-3 text-left">@lang('models/kardex_movement.attributes.product_id')</th>
                <th class="px-6 py-3 text-left">@lang('models/kardex_movement.attributes.kardex_movement_type')</th>
                <th class="px-6 py-3 text-left">@lang('models/kardex_movement.attributes.stock_before')</th>
                <th class="px-6 py-3 text-left">@lang('models/kardex_movement.attributes.stock_after')</th>
                <th class="px-6 py-3 text-left">@lang('models/kardex_movement.attributes.movement_at')</th>
            </tr>
        </thead>
        <tbody class="text-sm font-light text-gray-600 dark:text-gray-200 ">
            @forelse ($kardexMovements as $item)
                <tr
                    class="border-b border-gray-200 hover:bg-gray-600 hover:text-gray-50 dark:hover:bg-gray-100 dark:hover:text-gray-900">
                    <td class="px-6 py-3 text-left">{{ $loop->iteration }}</td>
                    <td class="px-6 py-3 text-left">{{ $item->product->name }}</td>
                    <td class="px-6 py-3 text-left">{{ $item->kardex_movement_type }}</td>
                    <td class="px-6 py-3 text-left">{{ $item->stock_before }}</td>
                    <td class="px-6 py-3 text-left">{{ $item->stock_after }}</td>
                    <td class="px-6 py-3 text-left">{{ $item->movement_at }}</td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</div>
