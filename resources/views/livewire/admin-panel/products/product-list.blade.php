<div>
    <table class="w-full table-auto">
        <thead>
            <tr class="text-sm leading-normal text-gray-600 uppercase bg-gray-200 dark:bg-gray-600 dark:text-gray-100">
                <th class="px-6 py-3 text-left">@lang('models/product.attributes.product_category_id')</th>
                <th class="px-6 py-3 text-left">@lang('models/product.attributes.name')</th>
                <th class="px-6 py-3 text-left">@lang('models/product.attributes.description')</th>
                <th class="px-6 py-3 text-left">@lang('models/default.created_at')</th>
                <th class="px-6 py-3 text-left">@lang('models/default.updated_at')</th>
                <th class="px-6 py-3 text-left">~</th>
            </tr>
        </thead>
        <tbody class="text-sm font-light text-gray-600 dark:text-gray-200 ">
            @forelse ($products as $item)
                <tr
                    class="border-b border-gray-200 hover:bg-gray-600 hover:text-gray-50 dark:hover:bg-gray-100 dark:hover:text-gray-900">
                    <td class="px-6 py-3 text-left">{{ $item->product_category->name }}</td>
                    <td class="px-6 py-3 text-left">{{ $item->name }}</td>
                    <td class="px-6 py-3 text-left">{{ $item->description }}</td>
                    <td class="px-6 py-3 text-left">{{ $item->created_at }}</td>
                    <td class="px-6 py-3 text-left">{{ $item->updated_at }}</td>
                    <td class="w-fit">
                        <div class="grid grid-flow-col grid-rows-1 gap-1">
                            <a href="{{ route('admin_panel.products.show', $item) }}"
                                class="px-1 py-1 text-center text-white bg-indigo-600 rounded-l-3xl"><i
                                    class="fas fa-edit"></i></a>
                            @livewire('admin-panel.products.product-delete', ['product' => $item], key("product-delete-{$item->id}"))
                        </div>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</div>
