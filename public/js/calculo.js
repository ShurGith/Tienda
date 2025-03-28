document.addEventListener('DOMContentLoaded', () => {
	const totales = document.querySelectorAll('.total');
	const cantidades = document.querySelectorAll('[name = cantidad]');
	const precios = document.querySelectorAll('[name=precio]');
	const laCookie = "cookie_compras";
	
	function formatNumberToEuro(value) {
		if (isNaN(value)) return "Valor no válido";
		
		const formattedNumber = new Intl.NumberFormat('de-DE', {
			minimumFractionDigits: 2, maximumFractionDigits: 2
		}).format(value);
		
		const parts = formattedNumber.split(',');
		return `${parts[0]}<sup>,${parts[1]}</sup> €`;
	}
	
	function actualizaPrecio(num) {
		totales[num].innerHTML = formatNumberToEuro(parseInt(cantidades[num].value) * parseInt(precios[num].value) / 100)
	}
	
	for (let i = 0; i < totales.length; i++) {
		actualizaPrecio(i)
	}
	
	function actualizarCantidadEnCookie(productId, newQuantity) {
		fetch('/actualizar-cantidad', {
			method: 'POST', headers: {
				'Content-Type': 'application/json',
				'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')  // CSRF Token
			}, body: JSON.stringify({
				productId: productId, newQuantity: newQuantity
			})
		})
			.then(response => response.json())
			.then(data => {
				if (data.success) {
				} else {
					console.error('Error al actualizar la cookie');
				}
			})
			.catch(error => {
				console.error('Error:', error);
			});
	}
	
	cantidades.forEach((cantidad, index) => {
		cantidad.addEventListener('click', function () {
			actualizaPrecio(index);
			actualizarCantidadEnCookie(this.getAttribute("data-id"), parseInt(this.value, 10));
		});
		
	})
})