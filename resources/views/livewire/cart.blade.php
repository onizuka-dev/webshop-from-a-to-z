<div class="bg-white rounded-lg shadow p-8 mt-12">
    <table class="w-full text-left">
        <thead>
            <tr>
                <th class="text-right">Product</th>
                <th class="text-left">Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach($this->items as $item)
                <tr>
                    <td>{{ $item->product->name }} Size: {{ $item->variant->size }} Color: {{ $item->variant->color }}</td>
                    <td>{{ $item->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
