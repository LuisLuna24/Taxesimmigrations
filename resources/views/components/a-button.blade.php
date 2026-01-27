@props([
    'href',
    'variant' => 'primary-800'
])

@php
    // Estilos Base (Copiados exactamente de tu Astro)
    $baseStyles = "inline-flex items-center justify-center px-8 py-3 text-base font-bold rounded-xl transition-all duration-300 focus:outline-hidden focus:ring-2 focus:ring-offset-2 cursor-pointer";

    // Variantes
    $variants = [
        'primary-800' => "bg-primary-800 text-white hover:bg-primary-800/90 shadow-lg shadow-primary-800/30 hover:shadow-primary-800/50 hover:-translate-y-1 active:scale-95 focus:ring-primary-800",

        'rojo-800' => "bg-rojo-800 text-white hover:bg-rojo-800/90 shadow-lg shadow-rojo-800/30 hover:shadow-rojo-800/50 hover:-translate-y-1 active:scale-95 focus:ring-rojo-800",

        // Opción Outline (por si la quieres usar en el futuro, descomenta abajo y comenta la de arriba)
        /*
        'rojo-800' => "bg-white text-primary-800 border-2 border-primary-800/20 hover:bg-primary-800/5 shadow-lg shadow-primary-800/10 hover:-translate-y-1 active:scale-95 focus:ring-primary-800",
        */
    ];

    // Seleccionamos los estilos de la variante (o primary-800 por defecto)
    $variantStyles = $variants[$variant] ?? $variants['primary-800'];

    // Unimos todo
    $classes = $baseStyles . ' ' . $variantStyles;
@endphp

{{--
    $attributes->merge() hace dos cosas mágicas aquí:
    1. Agrega cualquier clase extra que pases al usar el componente (ej. class="mt-4").
    2. Pasa cualquier otro atributo HTML (ej. target="_blank", id="btn-hero") automáticamente.
--}}
<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
