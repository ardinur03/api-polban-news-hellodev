<x-splade-modal>
    <h1 class="font-bold text-lg">Detail Property</h1>

    <div class=" max-w-sm">
        @php
            echo '<pre>';
            echo json_encode($logs, JSON_PRETTY_PRINT);
            echo '</pre>';
        @endphp
    </div>
</x-splade-modal>
