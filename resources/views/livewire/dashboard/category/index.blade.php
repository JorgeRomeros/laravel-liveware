<div>

    <x-jet-action-message on="delete">
        {{ __("Categoria eliminada correctamente") }}
    </x-jet-action-message>

    <h1>listado de Categorias</h1>
    <table class="table w-full">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $c)
            <tr>
                <td>
                    {{ $c->title }}
                </td>
                <td>
                    <a href="{{ route('d-category-edit', $c) }}">Editar</a>
                    <x-jet-danger-button onclick="confirm('¿Estas seguro de Eliminar el Registro ?') || event.stopImmediatePropagation " wire:click="delete({{ $c }})">
                        Eliminar
                    </x-jet-danger-button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories->links() }}
</div>
