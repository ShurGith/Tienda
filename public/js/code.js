document.addEventListener('DOMContentLoaded', () => {
	if (screen.width > 768) return;
	const botonMenu = document.getElementById('mobile-button');
	const svgsMenu = botonMenu.querySelectorAll('svg');
	const menu = document.getElementById('mobile-menu');
	
	maniobra = () => {
		menu.classList.toggle('scale-y-0');
		menu.classList.toggle('opacity-0');
		for (const svg of svgsMenu)
			svg.classList.toggle('hidden');
	};
	botonMenu.addEventListener('click', () => {
		maniobra();
	});
	document.addEventListener('keydown', (evento) => {
		const keyCode = evento.key;
		if (!menu.classList.contains('scale-y-0') && keyCode === 'Escape') maniobra();
	});
});