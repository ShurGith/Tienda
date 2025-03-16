document.addEventListener('DOMContentLoaded', () => {
	const btnsFav = document.querySelectorAll('[data-tipo=heart-button]'),
		btnsTotals = document.querySelectorAll('[data-role=btnTotal]'),
		contadorFavs = document.getElementById("div-favorites"),
		flashVisible = document.getElementById('flashVisible'),
		//btnFlash = flashVisible.querySelector('button'),
		flashDelete = document.getElementById('flashdelete'),
		dataInfos = document.querySelectorAll('[data-role=info]'),
		contador = document.querySelector(".contador");
	let url = window.location.href.includes('/products/');
	alldelete = false;
	const containsString = (obj, str) => {
		return Object.values(obj).some(value => typeof value === 'string' && value.includes(str));
	};
	
	/*
	if (btnFlash !== null) {
		btnFlash.addEventListener('click', () => {
			quitaFlash();
		});
	}
	*/
	const quitaFlash = () => {
		nuevoDiv.classList.add('translate-x-full')
		setTimeout(function () {
			nuevoDiv.remove()
		}, 1200)
		if (flashDelete !== null) {
			setTimeout(function () {
				flashDelete.classList.add('hidden');
			}, 1000)
		}
		
		//	for (btn of btnsFav) btn.classList.toggle('pointer-events-none');
	};
	
	const muestraFlash = () => {
		nuevoDiv.classList.remove('translate-x-full')
		setTimeout(quitaFlash, 3000);
	};
	const toggleA = (elemento) => {
		elemento.classList.toggle('text-green-500');
		const tipText = elemento.querySelectorAll('[data-tipo=tip-text]');
		for (t of tipText) t.classList.toggle('hidden');
	};
	
	if (flashDelete !== null) alldelete = true;
	
	if (alldelete == true) setTimeout(muestraFlash, 300);
	
	
	btnsTotals.forEach((btnTot) => {
		btnTot.addEventListener('click', () => {
			muestraFlash();
		});
	});
	
	const origenDiv = document.querySelector("#flashVisible");
	let copiarAd = document.querySelector("#fav-show-add")
	let copiarRem = document.querySelector("#fav-show-remove")
	
	const clonaAdd = (pasado) => {
		nuevoDiv = pasado.cloneNode(true)
		origenDiv.prepend(nuevoDiv); // Agrega e
		setTimeout(muestraFlash, 200);
	}
	
	
	btnsFav.forEach((btnFav) => {
		btnFav.addEventListener("click", function () {
			productId = this.getAttribute("data-id");
			//this.classList.add('pointer-events-none');
			//for (btn of btnsFav) btn.classList.toggle('pointer-events-none');
			for (dato of dataInfos) dato.innerText = this.dataset.nameproduct;
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
						clonaAdd(copiarAd);
					} else {
						contador.innerText = (+contador.innerText) - 1;
						clonaAdd(copiarRem);
					}
					if (contador.innerText === "0") {
						contadorFavs.classList.add('hidden');
					} else {
						contadorFavs.classList.remove('hidden');
					}
				});
		});
	})
});
