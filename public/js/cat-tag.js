document.addEventListener('DOMContentLoaded', () => {
	const tags = document.querySelectorAll('[data-role=tag]')
	const ancho = document.querySelectorAll('[data-role=categ]')[0].clientWidth + 'px'
	
	tags.forEach((tag) => {
		tag.style.minWidth = ancho
	})
	
})