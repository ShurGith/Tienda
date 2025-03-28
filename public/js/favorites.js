document.addEventListener('DOMContentLoaded', () => {
	const btnsFav = document.querySelectorAll('[data-tipo=heart-button]'),
		btnsTotals = document.querySelectorAll('[data-role=btnTotal]'),
		contadorFavs = document.getElementById("div-favorites"), //btnFlash = flashVisible.querySelector('button'),
		contador = document.querySelector(".contador-fav"), contenedor = document.getElementById("flashVisible"),
		bannerAdd = document.querySelector("#fav-show-add"), bannerRem = document.querySelector("#fav-show-remove"),
		bannerDel = document.querySelector("#flashdelete");
	
	let avisoId = 0;
	const colaAvisos = [];
	
	const quitaFlash = (pasado) => {
		pasado.classList.remove('translate-none');
		pasado.querySelector('.flashBarra').classList.remove('animateBarra');
	};
	
	const muestraFlash = (pasado) => {
		pasado.classList.add('translate-x-full');
		pasado.querySelector('.flashBarra').classList.add('animateBarra');
		
		setTimeout(function () {
			quitaFlash(pasado);
		}, 4000);
	};
	
	
	crearNuevo = function (pasado) {
		avisoId++;
		nuevoDiv = pasado.cloneNode(true)
		nuevoDiv.dataset.id = avisoId
		contenedor.appendChild(nuevoDiv);
		colaAvisos.push(nuevoDiv);
		setTimeout(() => {
			nuevoDiv.classList.add('translate-none')
		}, 0)
		nuevoDiv.querySelector('.flashBarra').classList.add('animateBarra');
		setTimeout(() => {
			quitaFlash(colaAvisos[0])
		}, 4000)
		setTimeout(() => {
			const primerAviso = colaAvisos.shift();
			if (nuevoDiv.parentNode) {
				primerAviso.remove();
			}
		}, 4200);
	};
	
	
	alldelete = false;
	const containsString = (obj, str) => {
		return Object.values(obj).some(value => typeof value === 'string' && value.includes(str));
	};
	
	
	const toggleA = (elemento) => {
		elemento.classList.toggle('text-green-500');
		const tipText = elemento.querySelectorAll('[data-tipo=tip-text]');
		for (let tip of tipText) tip.classList.toggle('hidden');
	};
	
	
	if (bannerDel) {
		setTimeout(function () {
			muestraFlash(bannerDel);
		}, 300);
	}
	
	btnsTotals.forEach((btnTot) => {
		btnTot.addEventListener('click', () => {
			muestraFlash();
		});
	});
	
	btnsFav.forEach((btnFav) => {
		btnFav.addEventListener("click", function () {
			productId = this.getAttribute("data-id");
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
						bannerAdd.querySelector('[data-role=info]').innerText = this.dataset.nameproduct;
						crearNuevo(bannerAdd);
					} else {
						contador.innerText = (+contador.innerText) - 1;
						bannerRem.querySelector('[data-role=info]').innerText = this.dataset.nameproduct;
						crearNuevo(bannerRem);
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
