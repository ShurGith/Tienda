document.addEventListener('DOMContentLoaded', () => {
	const btnsFav = document.querySelectorAll('[data-tipo=heart-button]'),
		btnsTotals = document.querySelectorAll('[data-role=btnTotal]'),
		divFavorites = document.getElementById("div-favorites"),
		flashMenssage = document.getElementById('flashMessage'),
		dataInfos = document.querySelectorAll('[data-role=info]'),
		btnFlash = flashMenssage.querySelector('button'),
		flashDelete = document.getElementById('flashdelete'),
		contador = document.querySelector(".contador");
	let url = window.location.href.includes('/products/');
	alldelete = false;
	const containsString = (obj, str) => {
		return Object.values(obj).some(value => typeof value === 'string' && value.includes(str));
	};
	
	if (btnFlash !== null) {
		btnFlash.addEventListener('click', () => {
			quitaFlash();
		});
	}
	
	
	const quitaFlash = () => {
		flashMenssage.firstElementChild.classList.add('translate-x-full');
		if (flashDelete !== null)
			setTimeout(function () {
				flashDelete.classList.add('hidden');
			}, 1000);
		for (btn of btnsFav)
			btn.classList.remove('pointer-events-none');
	};
	
	const muestraFlash = () => {
		flashMenssage.firstElementChild.classList.remove('translate-x-full');
		setTimeout(quitaFlash, 3000);
	};
	const toggleA = (elemento) => {
		elemento.classList.toggle('text-green-500');
		const tipText = elemento.querySelectorAll('[data-tipo=tip-text]');
		for (t of tipText)
			t.classList.toggle('hidden');
	};
	
	if (flashDelete !== null)
		alldelete = true;
	
	if (alldelete == true)
		setTimeout(muestraFlash, 300);
	
	
	btnsTotals.forEach((btnTot) => {
		btnTot.addEventListener('click', () => {
			muestraFlash();
		});
	});
	
	
	btnsFav.forEach((btnFav) => {
		btnFav.addEventListener("click", function () {
			productId = this.getAttribute("data-id");
			this.classList.add('pointer-events-none');
			for (dato of dataInfos)
				dato.innerText = this.dataset.nameproduct;
			alldelete = true;
			toggleA(this);
			fetch(`/favorites/toggle/${productId}`, {
				method: "POST", headers: {
					"X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
					"Content-Type": "application/json"
				}
			})
				.then(response => response.json())
				.then(data => {
					if (containsString(data.favorites, productId)) {
						contador.innerText = (+contador.innerText) + 1;
						//if (url == true) {
						document.querySelector('.fav-show-add').classList.remove('hidden');
						document.querySelector('.fav-show-remove').classList.add('hidden');
						muestraFlash();
						//	}
						
					} else {
						contador.innerText = (+contador.innerText) - 1;
						//	if (url == true) {
						document.querySelector('.fav-show-remove').classList.remove('hidden');
						document.querySelector('.fav-show-add').classList.add('hidden');
						muestraFlash();
						//	}
					}
					if (contador.innerText === "0") {
						divFavorites.classList.add('hidden');
					} else {
						divFavorites.classList.remove('hidden');
					}
				});
		});
	})
});
