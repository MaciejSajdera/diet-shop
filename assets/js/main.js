/**
 * Main JavaScript file.
 */
import Navigation from "./navigation.js";
import skipLinkFocus from "./skip-link-focus-fix.js";
import smoothscroll from "smoothscroll-polyfill";
import isElementInViewport from "../js/helperFunctions";

window.addEventListener("DOMContentLoaded", event => {
	const navigation = new Navigation();
	navigation.setupNavigation();

	smoothscroll.polyfill();

	const myPreloader = document.querySelector(".my-preloader");
	const page = document.querySelector("#page");
	const topPromoItems = document.querySelectorAll(".top-promo-item");

	setTimeout(() => {
		myPreloader.classList.add("my-preloader-off");
	}, 400);

	setTimeout(() => {
		myPreloader.classList.add("my-preloader-none");
		page.classList.add("page-loaded");

		if (topPromoItems) {
			topPromoItems.forEach(element => {
				element.classList.add("top-promo-items-loaded");
			});
		}
	}, 500);

	setTimeout(() => {
		cookiesNotification();
	}, 1000);

	const cookiesNotification = () => {
		const cookiesInfo = document.querySelector(".cookie-law-notification");
		const cookiesAcceptButton = document.querySelector("#cookie-law-button");

		if (localStorage.getItem("cookiesAreAccepted")) {
			return;
		} else {
			cookiesInfo.classList.add("cookies-notification-on");
			cookiesAcceptButton.addEventListener("click", () => {
				localStorage.setItem("cookiesAreAccepted", "1");
				cookiesInfo.classList.add("cookies-notification-off");
			});
			return;
		}
	};

	//	for showcase purposes only //
	// document.querySelectorAll("A").forEach(link => {
	// 	link.classList.contains("custom-logo-link") ||
	// 	(link.closest("LI") &&
	// 		link.closest("LI").classList.contains("menu-item-3503")) ||
	// 	(link.closest("LI") &&
	// 		link.closest("LI").classList.contains("menu-item-110"))
	// 		? ""
	// 		: link.setAttribute("href", "");
	// });

	const mobileMenu = () => {
		//wp menu
		const nav = document.querySelector("#site-navigation");
		const allMenuLinks = nav.querySelectorAll("LI");
		const linksWithChildren = nav.querySelectorAll(".menu-item-has-children a");
		const backButton = document.querySelector("#back-button");

		const wooMenu = document.querySelector("#menu-woomenu");

		linksWithChildren.forEach(link => {
			link.nextElementSibling &&
			link.nextElementSibling.classList.contains("sub-menu")
				? (link.style.pointerEvents = "none")
				: "";
		});

		nav.addEventListener("click", function(e) {
			let backButtonAppended = false;
			console.log(e.target);

			if (e.target.classList.contains("menu-item-has-children")) {
				// e.preventDefault();

				e.target.querySelector("#back-button")
					? e.target.querySelector("#back-button").remove()
					: "";

				const myBackButton = document.createElement("LI");
				myBackButton.id = "back-button";
				myBackButton.classList.add("back-button");
				myBackButton.innerText = "Powrót";

				const submenu = e.target.querySelector(".sub-menu");

				const appendButton = () => {
					if (!backButtonAppended) {
						submenu.appendChild(myBackButton);
						backButtonAppended = true;
					}
				};

				appendButton();

				submenu.classList.add("sub-menu--expanded");

				//delay
				if (wooMenu) {
					setTimeout(function() {
						wooMenu.scrollTop = 0;
					}, 0);
				}

				myBackButton.addEventListener("click", function(e) {
					const submenuExpanded = this.closest(".sub-menu--expanded");
					submenuExpanded.classList.remove("sub-menu--expanded");
					this.remove();
					backButtonAppended = false;
				});
			}

			if (
				e.target.classList.contains("mobile-list-title") ||
				(e.target.parentNode &&
					e.target.parentNode.classList.contains("mobile-list-title"))
			) {
				console.log("category");
				const categoryToggleMobile = document.querySelector(
					".mobile-list-title"
				);
				const categoryList = document.querySelector(".menu-woomenu-container");
				const pageMenu = document.querySelector("#menu-menu-1");
				const shopMenu = document.querySelector(".shop-menu");
				const siteNav = document.querySelector("#site-navigation");

				categoryList.classList.toggle("category-menu-toggled");
				pageMenu.classList.toggle("mobile-page-menu-hidden");
				shopMenu.classList.toggle("show-categories-menu");

				categoryToggleMobile.classList.toggle("mobile-list-title-toggled");
			} else {
				console.log("returning");
				return;
			}
		});
	};

	const mediaQueryMobile = window.matchMedia("(max-width: 992px)");
	function handleMobileChange(e) {
		// Check if the media query is true
		if (e.matches) {
			// Then log the following message to the console
			console.log("Media Query Mobile Matched!");
			mobileMenu();
		}
	}

	mediaQueryMobile.addListener(handleMobileChange);
	handleMobileChange(mediaQueryMobile);

	const desktopMenu = () => {
		const nav = document.querySelector("#site-navigation");
		const linksWithChildren = nav.querySelectorAll(".menu-item-has-children a");

		linksWithChildren.forEach(link => {
			link.nextElementSibling &&
			link.nextElementSibling.classList.contains("sub-menu")
				? (link.style.pointerEvents = "auto")
				: "";
		});
	};

	const mediaQueryDesktop = window.matchMedia("(min-width: 992px)");
	function handleDesktopChange(e) {
		// Check if the media query is true
		if (e.matches) {
			// Then log the following message to the console
			console.log("Media Query Desktop Matched!");
			desktopMenu();
		}
	}
	mediaQueryDesktop.addListener(handleDesktopChange);
	handleDesktopChange(mediaQueryDesktop);

	document.addEventListener("click", e => {
		const searchToggleSVG = document.querySelector("#search-icon svg");
		const searchToggleSVGPath = document.querySelectorAll(
			"#search-icon svg path"
		);
		const searchToggleIcon = document.querySelector("#search-icon");
		const searchToggleWrapper = document.querySelector(".search-desktop");
		const searchToggleSubText = document.querySelector(".search-sub-icon-text");
		const searchPanel = document.querySelector(".search-panel");
		const searchInput = document.querySelector(".dgwt-wcas-search-input");

		if (
			e.target === searchToggleSVG ||
			e.target === searchToggleSVGPath[0] ||
			e.target === searchToggleSVGPath[1] ||
			e.target === searchToggleIcon ||
			e.target === searchToggleSubText ||
			e.target === searchToggleWrapper
		) {
			searchPanel.classList.toggle("search-panel--toggled");
			searchToggleSVG.classList.toggle("search-icon-clicked");

			if (window.innerWidth >= 992) {
				searchInput.focus();
			}
		}
	});

	const switchSignIn = document.querySelector("#switch-sign-in");
	const switchSignUp = document.querySelector("#switch-sign-up");
	const signInWrapper = document.querySelector(".sign-in-wrapper");
	const signUpWrapper = document.querySelector(".sign-up-wrapper");

	if (switchSignIn) {
		switchSignUp.addEventListener("click", () => {
			signInWrapper.classList.remove("form-active");
			signUpWrapper.classList.add("form-active", "choose-customer-type");

			switchSignIn.classList.remove("switch-active");
			switchSignUp.classList.add("switch-active");
		});

		switchSignIn.addEventListener("click", () => {
			signUpWrapper.classList.remove("form-active", "choose-customer-type");
			signInWrapper.classList.add("form-active");

			switchSignUp.classList.remove("switch-active");
			switchSignIn.classList.add("switch-active");
		});
	}

	const registerAsRetail = document.querySelector("#registerAsRetail");
	const registerAsWholesale = document.querySelector("#registerAsWholesale");

	if (registerAsRetail && registerAsWholesale) {
		//showing form after choosing customer type
		const signUpForm = document.querySelector(".sign-up-wrapper form");

		//switching input fields betweem wholesale and retail customer

		const customRegisterFormFields = document.querySelectorAll(
			".my-custom-form-field"
		);

		const customRegisterFormFieldsInputs = document.querySelectorAll(
			".my-custom-form-field input"
		);
		const wholesaleInfo = document.querySelector(".wholesale-info");

		registerAsRetail.addEventListener("click", function retailFunction() {
			registerAsWholesale.classList.contains("customer-type-chosen")
				? registerAsWholesale.classList.remove("customer-type-chosen")
				: "";

			this.classList.add("customer-type-chosen");

			wholesaleInfo.classList.contains("show-info")
				? wholesaleInfo.classList.remove("show-info")
				: "";

			customRegisterFormFields.forEach(field => {
				field.style.display = "none";
			});

			customRegisterFormFieldsInputs.forEach(field => {
				field.required = false;
			});

			signUpForm.classList.add("form-type-chosen");
		});

		registerAsWholesale.addEventListener("click", function wholesaleFunction() {
			registerAsRetail.classList.contains("customer-type-chosen")
				? registerAsRetail.classList.remove("customer-type-chosen")
				: "";

			this.classList.add("customer-type-chosen");

			wholesaleInfo.classList.add("show-info");

			customRegisterFormFields.forEach(field => {
				field.style.display = "block";
			});

			customRegisterFormFieldsInputs.forEach(field => {
				field.required = true;
			});

			signUpForm.classList.add("form-type-chosen");
		});
	}

	//Lazy Loading

	let lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));
	let active = false;

	const lazyLoad = function() {
		//lazy loading of images code below
		if (document.body.classList.contains("woocommerce-cart")) {
			return;
		}

		if (active === false) {
			active = true;

			setTimeout(function() {
				lazyImages.forEach(function(lazyImage) {
					if (
						lazyImage.getBoundingClientRect().top <= window.innerHeight &&
						lazyImage.getBoundingClientRect().bottom >= 0 &&
						getComputedStyle(lazyImage).display !== "none"
					) {
						lazyImage.src = lazyImage.dataset.src;
						lazyImage.srcset = lazyImage.dataset.srcset;
						lazyImage.classList.remove("lazy");

						lazyImages = lazyImages.filter(function(image) {
							return image !== lazyImage;
						});

						if (lazyImages.length === 0) {
							document.removeEventListener("scroll", lazyLoad);
							window.removeEventListener("resize", lazyLoad);
							window.removeEventListener("orientationchange", lazyLoad);
						}
					}
				});

				active = false;
			}, 200);
		}
	};

	lazyLoad();

	document.addEventListener("scroll", lazyLoad);
	window.addEventListener("resize", lazyLoad);
	window.addEventListener("orientationchange", lazyLoad);

	jQuery(document).on("woof_ajax_done", woof_ajax_done_handler);

	function woof_ajax_done_handler(e) {
		let lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));
		let active = false;

		const lazyLoad = function() {
			if (active === false) {
				active = true;

				setTimeout(function() {
					lazyImages.forEach(function(lazyImage) {
						if (
							lazyImage.getBoundingClientRect().top <= window.innerHeight &&
							lazyImage.getBoundingClientRect().bottom >= 0 &&
							getComputedStyle(lazyImage).display !== "none"
						) {
							lazyImage.src = lazyImage.dataset.src;
							lazyImage.srcset = lazyImage.dataset.srcset;
							lazyImage.classList.remove("lazy");

							lazyImages = lazyImages.filter(function(image) {
								return image !== lazyImage;
							});

							if (lazyImages.length === 0) {
								document.removeEventListener("scroll", lazyLoad);
								window.removeEventListener("resize", lazyLoad);
								window.removeEventListener("orientationchange", lazyLoad);
							}
						}
					});

					active = false;
				}, 200);
			}
		};

		lazyLoad();

		const pagination = document.querySelector(".woocommerce-pagination");

		if (pagination) {
			isElementInViewport(pagination)
				? window.scrollTo({
						top: 100,
						behavior: "smooth"
				  })
				: "";
		}

		document.addEventListener("scroll", lazyLoad);

		window.addEventListener("resize", lazyLoad);
		window.addEventListener("orientationchange", lazyLoad);
	}

	const toggleFilters = document.querySelector("#toggle-filters");

	if (toggleFilters) {
		const woofFilters = document.querySelector(".woof");
		toggleFilters.addEventListener("click", e => {
			woofFilters.classList.toggle("woof__show");
		});
	}

	//li hover effect - Noel Delgado | @pixelia_me

	const directions = { 0: "top", 1: "right", 2: "bottom", 3: "left" };
	const classNames = ["in", "out"]
		.map(p => Object.values(directions).map(d => `${p}-${d}`))
		.reduce((a, b) => a.concat(b));

	const getDirectionKey = (ev, node) => {
		const { width, height, top, left } = node.getBoundingClientRect();
		const l = ev.pageX - (left + window.pageXOffset);
		const t = ev.pageY - (top + window.pageYOffset);
		const x = l - (width / 2) * (width > height ? height / width : 1);
		const y = t - (height / 2) * (height > width ? width / height : 1);
		const directionKey =
			Math.round((Math.atan2(y, x) * (180 / Math.PI) + 180) / 90 + 3) % 4;
		return directionKey;
	};

	class Item {
		constructor(element) {
			this.element = element;
			element.addEventListener("mouseover", ev => this.update(ev, "in"));
			element.addEventListener("mouseout", ev => this.update(ev, "out"));
		}

		update(ev, prefix) {
			this.element.classList.remove(...classNames);
			this.element.classList.add(
				`${prefix}-${directions[getDirectionKey(ev, this.element)]}`
			);
		}
	}

	const allWooCategoryMenuLinks = document.querySelectorAll(
		"#menu-woomenu > li > a"
	);

	if (allWooCategoryMenuLinks) {
		const linksToDirectionHover = [].slice.call(allWooCategoryMenuLinks, 0);
		linksToDirectionHover.forEach(node => new Item(node));
	}

	const allShowcaseCategories = document.querySelectorAll(
		".categories-showcase__wrapper > a"
	);

	if (allShowcaseCategories) {
		const categoriesToDirectionHover = [].slice.call(allShowcaseCategories, 0);
		categoriesToDirectionHover.forEach(node => new Item(node));
	}

	document.addEventListener("scroll", () => {
		const scrollToTopBtn = document.querySelector(".scrollToTopBtn");
		if (scrollToTopBtn) {
			if (pageYOffset > window.innerHeight) {
				scrollToTopBtn.classList.add("showBtn");
			} else {
				scrollToTopBtn.classList.remove("showBtn");
			}
			scrollToTopBtn.addEventListener("click", () => {
				window.scrollTo({
					top: 0,
					behavior: "smooth"
				});
			});
		}
	});

	// const wooGalleryThumbnails = document.querySelectorAll(
	// 	".woocommerce-product-gallery--with-images .flex-control-thumbs li"
	// );

	// if (wooGalleryThumbnails) {
	// 	console.log(wooGalleryThumbnails);

	// 	wooGalleryThumbnails.forEach(thumbnail => {
	// 		thumbnail.addEventListener("click", e => {
	// 			e.preventDefault();
	// 			console.log(`thumbevent: ${e.target}`);
	// 		});
	// 	});
	// }
});

// const closePromo = document.querySelector("#close-promo");

// closePromo.addEventListener("click", () => {
// 	const siteNavigation = document.querySelector("#site-navigation");
// 	const topPromo = document.querySelector(".top-promo");

// 	siteNavigation.classList.remove("promo-navigation");
// 	topPromo.parentNode.removeChild(topPromo);
// });

// function debounce(func, wait, immediate) {
// 	var timeout;

// 	return function executedFunction() {
// 		var context = this;
// 		var args = arguments;

// 		var later = function() {
// 			timeout = null;
// 			if (!immediate) func.apply(context, args);
// 		};

// 		var callNow = immediate && !timeout;

// 		clearTimeout(timeout);

// 		timeout = setTimeout(later, wait);

// 		if (callNow) func.apply(context, args);
// 	};
// }

// const subListOpener = document.querySelector(".woof_is_open");
// if (subListOpener) {
// 	subListOpener.addEventListener("click", () => {
// 		subListOpener.classList.add("sublist-opener-open");
// 		console.log("test");
// 	});
// }

// document.addEventListener("click", e => {
// 	console.log(e.target);
// });
