import isElementInViewport from "./helperFunctions";
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

document.addEventListener("DOMContentLoaded", event => {
	//**HOME SINGULAR**//

	class RevealChildrenOf {
		constructor(elementsParent, delayTime) {
			this.elementsParent = elementsParent;
			this.delayTime = delayTime;

			if (!elementsParent) {
				return;
			}

			this.hide();

			isElementInViewport(this.elementsParent)
				? this.reveal()
				: document.addEventListener("scroll", () => {
						this.reveal();
				  });
		}

		hide() {
			[...this.elementsParent.children].map((element, i) => {
				element.style.opacity = "0";
			});
		}

		reveal() {
			isElementInViewport(this.elementsParent)
				? [...this.elementsParent.children].map((element, i) => {
						element.style.transition = `all 0.${this.delayTime}s ease-in`;
						element.style.transitionDelay = `${i / this.delayTime}s`;
						element.style.opacity = "1";
				  })
				: "";
		}
	}

	// const advantagesWrapper = document.querySelector(".advantages-wrapper");

	// setTimeout(() => {
	// 	new RevealChildrenOf(advantagesWrapper);
	// }, 500);

	const offerContainer = document.querySelector(".offer-container");
	new RevealChildrenOf(offerContainer, 5);

	const stepsContainer = document.querySelector(".steps-wrapper");
	new RevealChildrenOf(stepsContainer, 4);

	// const pricesWrapper = document.querySelector(".prices-wrapper");
	// new RevealChildrenOf(pricesWrapper, 2);

	//**GSAP**//

	gsap.registerPlugin(ScrollTrigger);

	function hide(elem) {
		gsap.set(elem, { autoAlpha: 0 });
	}

	//overall
	function animateFrom(elem, direction) {
		direction = direction | 1;

		var x = 0,
			y = 800;
		if (
			elem.classList.contains("gs_reveal_fromLeft") &&
			window.innerWidth > 992
		) {
			x = -1000;
			y = 0;
		} else if (
			elem.classList.contains("gs_reveal_fromLeftShort") &&
			window.innerWidth > 992
		) {
			x = -200;
			y = 0;
		} else if (
			elem.classList.contains("gs_reveal_fromRight") &&
			window.innerWidth > 992
		) {
			x = 1000;
			y = 0;
		} else if (
			elem.classList.contains("gs_reveal_fromRightShort") &&
			window.innerWidth > 992
		) {
			x = 200;
			y = 0;
		}

		gsap.fromTo(
			elem,
			{ x: x, y: y, autoAlpha: 0 },
			{
				duration: 2.5,
				x: 0,
				y: 0,
				autoAlpha: 1,
				ease: "expo",
				overwrite: "auto"
			}
		);
	}

	gsap.utils.toArray(".gs_reveal").forEach(function(elem) {
		hide(elem); // assure that the element is hidden when scrolled into view

		ScrollTrigger.create({
			trigger: elem,
			once: true,
			onEnter: function() {
				animateFrom(elem);
			}
		});
	});

	//singular
	function overflowUp(elem, direction, howhigh) {
		direction = direction | 1;

		var x = 0,
			y = 300;

		if (elem.classList.contains("overflow-up__50") && window.innerWidth > 992) {
			howhigh = -100;
		} else if (
			elem.classList.contains("overflow-up__100") &&
			window.innerWidth > 992
		) {
			howhigh = -50;
		} else if (
			elem.classList.contains("overflow-up__250") &&
			window.innerWidth > 992
		) {
			howhigh = -250;
		} else if (
			elem.classList.contains("overflow-up__50") &&
			window.innerWidth > 1400
		) {
			howhigh = -50;
		} else if (
			elem.classList.contains("overflow-up__100") &&
			window.innerWidth > 1400
		) {
			howhigh = -100;
		} else if (elem.classList.contains("overflow-up__250")) {
			howhigh = -250;
		} else {
			howhigh = 0;
		}

		gsap.fromTo(
			elem,
			{ x: x, y: y, autoAlpha: 0 },
			{
				duration: 2.5,
				x: 0,
				y: howhigh,
				autoAlpha: 1,
				ease: "expo",
				overwrite: "auto"
			}
		);
	}

	gsap.utils.toArray(".overflow-up").forEach(function(elem) {
		hide(elem); // assure that the element is hidden when scrolled into view

		ScrollTrigger.create({
			trigger: elem,
			once: true,
			onEnter: function() {
				overflowUp(elem);
			}
		});
	});
});

// function overflowUp(elem, direction) {
// 	direction = direction | 1;

// 	var x = 0,
// 		y = 200;

// 	if (
// 		elem.classList.contains("overflow-up__low") &&
// 		window.innerWidth > 992
// 	) {
// 		let overflow = -50;
// 		gsap.fromTo(
// 			elem,
// 			{ x: x, y: y, autoAlpha: 0 },
// 			{
// 				duration: 2.5,
// 				x: 0,
// 				y: overflow,
// 				autoAlpha: 1,
// 				ease: "expo",
// 				overwrite: "auto"
// 			}
// 		);
// 	} else if (
// 		elem.classList.contains("overflow-up__high") &&
// 		window.innerWidth > 992
// 	) {
// 		let overflow = -250;
// 		gsap.fromTo(
// 			elem,
// 			{ x: x, y: y, autoAlpha: 0 },
// 			{
// 				duration: 2.5,
// 				x: 0,
// 				y: overflow,
// 				autoAlpha: 1,
// 				ease: "expo",
// 				overwrite: "auto"
// 			}
// 		);
// 	}

// 	else if (
// 		elem.classList.contains("overflow-up__high") &&
// 		window.innerWidth > 992
// 	) {
// 		let overflow = -250;
// 		gsap.fromTo(
// 			elem,
// 			{ x: x, y: y, autoAlpha: 0 },
// 			{
// 				duration: 2.5,
// 				x: 0,
// 				y: overflow,
// 				autoAlpha: 1,
// 				ease: "expo",
// 				overwrite: "auto"
// 			}
// 		);
// 	}
// }
