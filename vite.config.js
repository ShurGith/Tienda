import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';
import tailwindcss from "@tailwindcss/vite";

const host = 'tienda.test';
export default defineConfig({
	plugins: [laravel({
		input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/tiptap/extensions.js', 'resources/css/tiptap/extensions.css',],
		refresh: [...refreshPaths, `resources/views/**/*`, 'app/Filament/**', 'app/Livewire/**',],
	}), tailwindcss(),], server: {
		host, hmr: { host }, cors: true,
	},
});