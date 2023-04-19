/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/views/**/*.blade.php", "./app/Http/Livewire"],
    theme: {
        extend: {},
    },
    plugins: ["@tailwindcss/forms", "@tailwindcss/ui"],
};
