document.addEventListener('DOMContentLoaded', () => {
	const btnsFav = document.querySelectorAll('[data-tipo=heart-button]'),
		btnsTotals = document.querySelectorAll('[data-role=btnTotal]'),
		contadorFavs = document.getElementById("div-favorites"),
		//btnFlash = flashVisible.querySelector('button'),
		contador = document.querySelector(".contador"),
		bannerAdd = document.querySelector("#fav-show-add"),
		bannerRem = document.querySelector("#fav-show-remove"),
		bannerDel = document.querySelector("#flashdelete");
	
	
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
	const quitaFlash = (pasado) => {
		pasado.classList.remove('translate-x-0');
		pasado.querySelector('.flashBarra').classList.remove('animateBarra');
	};
	
	const muestraFlash = (pasado) => {
		pasado.classList.add('translate-x-0');
		pasado.querySelector('.flashBarra').classList.add('animateBarra');
		setTimeout(function () {
			quitaFlash(pasado);
		}, 4000);
		
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
						muestraFlash(bannerAdd);
					} else {
						contador.innerText = (+contador.innerText) - 1;
						bannerRem.querySelector('[data-role=info]').innerText = this.dataset.nameproduct;
						muestraFlash(bannerRem);
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
