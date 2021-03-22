// import Swiper JS
import Swiper, {
	Navigation,
	Autoplay,
	Pagination,
	Parallax,
	EffectFade,
	Lazy
} from "swiper";
// import Swiper styles
import "swiper/swiper-bundle.css";

document.addEventListener("DOMContentLoaded", () => {
	Swiper.use([Navigation, Autoplay, Pagination, Parallax, EffectFade, Lazy]);

	var myReviewsSwiper = new Swiper(".swiper-container-reviews", {
		direction: "horizontal",
		loop: true,
		centeredSlides: true,
		centeredSlides: true,
		slidesPerView: 1,
		speed: 1000,
		autoplay: true,
		grabCursor: true,
		spaceBetween: 20,

		breakpoints: {
			992: {
				slidesPerView: 3,
				spaceBetween: 60
			}
		},

		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev"
		},

		pagination: {
			el: ".swiper-pagination-reviews",
			clickable: true
		}
	});

	var blogPostsHomeSwiper = new Swiper(".swiper-container-blog-posts", {
		direction: "horizontal",
		loop: true,
		centeredSlides: true,
		slidesPerView: 1.4,
		speed: 1000,
		autoplay: true,
		spaceBetween: 20,
		grabCursor: true,
		breakpoints: {
			992: {
				slidesPerView: 4,
				centeredSlides: false
			}
		},
		autoplayDisableOnInteraction: false,
		grabCursor: true,
		pagination: {
			el: ".swiper-pagination-blog-posts",
			clickable: true
		}
	});

	var blogPostsBlogSwiper = new Swiper(".swiper-container-blog-posts-blog", {
		direction: "vertical",
		loop: true,
		// centeredSlides: true,
		slidesPerView: 4,
		speed: 1000,
		autoplay: true,
		spaceBetween: 100,
		grabCursor: true,
		// breakpoints: {
		// 	992: {
		// 		slidesPerView: 4,
		// 		centeredSlides: false
		// 	}
		// },
		autoplayDisableOnInteraction: false,
		grabCursor: true,
		// pagination: {
		// 	el: ".swiper-pagination-blog-posts",
		// 	clickable: true
		// }

		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev"
		}
	});
});
