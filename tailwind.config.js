import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    presets: [require("./vendor/wireui/wireui/tailwind.config.js")],
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./vendor/wireui/wireui/src/*.php",
        "./vendor/wireui/wireui/ts/**/*.ts",
        "./vendor/wireui/wireui/src/WireUi/**/*.php",
        "./vendor/wireui/wireui/src/Components/**/*.php",
        "./vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php",
    ],

    // tailwind.config.js
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // PRIMARY: Azul (#062d5d)
                primary: {
                    50: "#eff6ff",
                    100: "#dbeafe",
                    200: "#bfdbfe",
                    300: "#93c5fd",
                    400: "#60a5fa",
                    500: "#3b82f6",
                    600: "#2563eb",
                    700: "#1d4ed8",
                    800: "#062d5d", // Tu color base queda en el tono 800
                    900: "#1e3a8a",
                    950: "#172554",
                },
                // SECONDARY: Rojo (#d10b0c)
                secondary: {
                    50: "#000000",
                    100: "#000000",
                    200: "#000000", // Esta es la clase que causaba el error
                    300: "#000000",
                    400: "#000000",
                    500: "#000000",
                    600: "#000000",
                    700: "#000000",
                    800: "#000000", // Tu color base queda en el tono 800
                    900: "#000000",
                    950: "#000000",
                },
                rojo: {
                    50: "#fef2f2",
                    100: "#fee2e2",
                    200: "#fecaca", // Esta es la clase que causaba el error
                    300: "#fca5a5",
                    400: "#f87171",
                    500: "#ef4444",
                    600: "#dc2626",
                    700: "#d10b0c",
                    800: "#d10b0c", // Tu color base queda en el tono 800
                    900: "#7f1d1d",
                    950: "#450a0a",
                },
            },
        },
    },

    plugins: [forms, typography],
};
