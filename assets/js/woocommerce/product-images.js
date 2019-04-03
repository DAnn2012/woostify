/**
 * Product images
 *
 * @package woostify
 */

'use strict';

// Carousel widget.
var productImages = function( selector, options ) {
	var element = document.querySelectorAll( selector );

	if ( ! element.length ) {
		return;
	}

	for ( var i = 0, j = element.length; i < j; i++ ) {

		if ( element[i].classList.contains( 'tns-slider' ) ) {
			continue;
		}

		var slider = tns( options );
	}
}

// Generate product images item.
function generateImageItem( fullSrc, imgSize, src ) {
	var item = '<figure class="image-item ez-zoom" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">';
	item += '<a href=' + fullSrc + ' data-size=' + imgSize + ' itemprop="contentUrl">';
	item += '<img src=' + src + ' itemprop="thumbnail">';
	item += '</a>';
	item += '</figure>';

	return item;
}

document.addEventListener( 'DOMContentLoaded', function(){

	// Product image.
	var imageCarousel,
		option = {
			loop: false,
			container: '#product-images',
			navContainer: '#product-thumbnail-images',
			items: 1,
			navAsThumbnails: true,
			autoHeight: true,
			mouseDrag: true
	}

	if ( document.getElementById( 'product-thumbnail-images' ) ) {
		imageCarousel = tns( option );
	}

	// Product thumb images.
	var thumbCarousel,
		thumbOption = {
			loop: false,
			container: '#product-thumbnail-images',
			gutter: 10,
			items: 5,
			mouseDrag: true,
			nav: false,
			controls: true
	}

	var media = window.matchMedia( '( min-width: 768px )' ).matches;
	if ( media ) {
		thumbOption.axis = document.body.classList.contains( 'has-gallery-layout-vertical' ) ? 'vertical' : 'horizontal';
	}

	if ( document.getElementById( 'product-thumbnail-images' ) ) {
		thumbCarousel = tns( thumbOption );
	}

	// Arrow event.
	function arrowsEvent() {
		if ( ! thumbCarousel ) {
			return;
		}

		var buttons = document.querySelectorAll( '.product-images .tns-controls button' );

		if ( ! buttons.length ) {
			return;
		}

		buttons.forEach( function( el ) {
			el.addEventListener( 'click', function() {
				var nav = el.getAttribute( 'data-controls' );

				if ( 'next' === nav ) {
					thumbCarousel.goTo( 'next' );
				} else {
					thumbCarousel.goTo( 'prev' );
				}
			} );
		} );
	}

	// Reset carousel.
	function resetCarousel() {
		if ( imageCarousel ) {
			imageCarousel.goTo( 'first' );
		}

		if ( thumbCarousel ) {
			thumbCarousel.goTo( 'first' );
		}
	}

	// Carousel action.
	function carouselAction() {
		// Trigger variation.
		jQuery( document.body ).on( 'found_variation', 'form.variations_form', function() {
			resetCarousel();

			for ( var i = 0, j = woostify_variation_gallery.length; i < j; i++ ) {
				console.log( woostify_variation_gallery[i] );
				if ( woostify_variation_gallery[i].css_class ) {
					var size = woostify_variation_gallery[i].full_src_w + 'x' + woostify_variation_gallery[i].full_src_h;
					document.body.innerHTML = generateImageItem( woostify_variation_gallery[i].full_src, size, woostify_variation_gallery[i].src );
					/*document.body.insertAdjacentHTML( 'beforebegin', generateImageItem( woostify_variation_gallery[i].full_src, size, woostify_variation_gallery[i].src ) );*/
				}
			}
		});

		// Trigger reset.
		jQuery( '.reset_variations' ).on( 'click', function(){
			resetCarousel();
		});
	}
	carouselAction();

	// Load event.
	window.addEventListener( 'load', arrowsEvent );

	// For Elementor Preview Mode.
	if ( 'function' === typeof( onElementorLoaded ) ) {
		onElementorLoaded( function() {
			window.elementorFrontend.hooks.addAction( 'frontend/element_ready/global', function() {
				productImages( '#product-images', option );
				productImages( '#product-thumbnail-images', thumbOption );
				carouselAction();
				arrowsEvent();
			} );
		} );
	}
} );
