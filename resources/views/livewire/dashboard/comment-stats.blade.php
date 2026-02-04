<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 hover:shadow-md transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Pendientes</p>
                <h3 class="text-3xl font-bold text-gray-700">{{ $stats['pending'] }}</h3>
            </div>
            <div class="bg-amber-50 p-3 rounded-lg">
                <x-w-icon name="clock" class="w-8 h-8 text-amber-500" />
            </div>
        </div>
        <div class="mt-4 pt-4 border-t border-gray-50">
            <a href="{{ route('admin.comments.index', ['table-filters[estatus]' => '0']) }}"
               class="inline-flex items-center text-sm font-medium text-amber-600 hover:text-amber-700">
                Revisar ahora
                <x-w-icon name="chevron-right" class="w-4 h-4 ml-1" />
            </a>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 hover:shadow-md transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Aprobados</p>
                <h3 class="text-3xl font-bold text-gray-700">{{ $stats['approved'] }}</h3>
            </div>
            <div class="bg-emerald-50 p-3 rounded-lg">
                <x-w-icon name="check-circle" class="w-8 h-8 text-emerald-500" />
            </div>
        </div>
        <div class="mt-4 pt-4 border-t border-gray-50">
            <a href="{{ route('admin.comments.index', ['table-filters[estatus]' => '1']) }}"
               class="inline-flex items-center text-sm font-medium text-emerald-600 hover:text-emerald-700">
                Ver historial
                <x-w-icon name="chevron-right" class="w-4 h-4 ml-1" />
            </a>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 hover:shadow-md transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Rechazados</p>
                <h3 class="text-3xl font-bold text-gray-700">{{ $stats['rejected'] }}</h3>
            </div>
            <div class="bg-rose-50 p-3 rounded-lg">
                <x-w-icon name="x-circle" class="w-8 h-8 text-rose-500" />
            </div>
        </div>
        <div class="mt-4 pt-4 border-t border-gray-50">
            <a href="{{ route('admin.comments.index', ['table-filters[estatus]' => '2']) }}"
               class="inline-flex items-center text-sm font-medium text-rose-600 hover:text-rose-700">
                Gestionar
                <x-w-icon name="chevron-right" class="w-4 h-4 ml-1" />
            </a>
        </div>
    </div>

</div>
