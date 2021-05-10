/**
 * Sticky Footer Bar js
 *
 * @package woostify
 */

const $ = jQuery
wp.customize.controlConstructor['woostify-color-group'] = wp.customize.Control.extend(
	{
		ready: function () {
			'use strict'
			let control         = this
			let control_wrap    = control.container.find( '.woostify-color-group-control' )
			let control_id      = control_wrap.data( 'control_id' )
			let color_format    = control.params.color_format
			let enable_opacity  = control.params.enable_opacity
			let enable_swatches = control.params.enable_swatches
			let swatches        = control.params.swatches
			let args            = {
				el: '.btn',
				theme: 'monolith',
				autoReposition: false,
				inline: false,
				container: '.woostify-color-group-control',
				lockOpacity: false,
				comparison: false,
				default: 'rgba(255,255,255,0)',
					defaultRepresentation: 'RGBA',
					adjustableNumbers: true,
					swatches: ! enable_swatches ? false : swatches,
					useAsButton: true,
					components: {
						// Main components.
						preview: false,
						opacity: true,
						hue: true,
						// Input / output Options.
						interaction: {
							hex: true,
							rgba: true,
							input: true,
							clear: true,
						},
				},
			}
			$.each(
				control.params.settings,
				function ( idx, obj ) {
					let btn_id_arr             = obj.split( '[' )
					let btn_id                 = (
						'undefined' === typeof btn_id_arr[1]
					) ? btn_id_arr[0] : btn_id_arr[1].split( ']' )[0]
					args.el                    = '.btn-' + btn_id
					args.container             = '.woostify-color-group-control-' + control_id
					args.default               = control.settings[idx].get()
					args.defaultRepresentation = color_format.toUpperCase()
					args.lockOpacity           = ! enable_opacity
					let pickr                  = new Pickr( args )
					$( args.el ).css( 'color', '' !== args.default ? args.default : ( enable_opacity ? 'rgba(255,255,255,0)' : 'rgb(255,255,255)' ) )
					pickr.on(
						'change',
						function ( color ) {
							control.settings[idx].set( colorFormat( color, color_format ).toString( 0 ) )
						},
					).on(
						'clear',
						function ( instance ) {
							instance.options.el.style.color = 'rgba(255,255,255,0)'
							control.settings[idx].set( instance.options.default )
						},
					)
					pickr.applyColor()
				},
			)
			control.container.find( '.woostify-reset' ).on(
				'click',
				function () {
					control.container.find( 'div.pcr-app' ).remove()
					let inputs          = control.container.find( 'input.color-group-value' )
					let buttons         = control.container.find( '.woostify-color-group-btn' )
					let container       = $( this ).closest( '.woostify-color-group-control' )
					let container_class = container.attr( 'class' ).split( ' ' )[2]
					$.each(
						control.params.settings,
						function ( idx ) {
							let reset_value = $( inputs[idx] ).data( 'reset_value' )
							$( buttons[idx] ).css( 'color', reset_value )
							control.settings[idx].set( reset_value )

							args.el                    = buttons[idx]
							args.container             = '.' + container_class
							args.default               = reset_value
							args.defaultRepresentation = color_format.toUpperCase()
							args.lockOpacity           = ! enable_opacity
							let pickr2                 = new Pickr( args )
							$( args.el ).css(
								'color',
								'' !== args.default ? args.default : (
								enable_opacity ? 'rgba(255,255,255,0)' : 'rgb(255,255,255)'
								)
							)
							pickr2.on(
								'change',
								function ( color ) {
									control.settings[idx].set( colorFormat( color, color_format ).toString( 0 ) )
								},
							).on(
								'clear',
								function ( instance ) {
									instance.options.el.style.color = 'rgba(255,255,255,0)'
									control.settings[idx].set( instance.options.default )
								},
							)
							pickr2.applyColor()
						},
					)
				},
			)

			function colorFormat( color, format = 'rgba' ) {
				// hsva.toHSVA() - Converts the object to a hsva array.
				// hsva.toHSLA() - Converts the object to a hsla array.
				// hsva.toRGBA() - Converts the object to a rgba array.
				// hsva.toHEXA() - Converts the object to a hexa-decimal array.
				// hsva.toCMYK() - Converts the object to a cmyk array.
				// hsva.clone() - Clones the color object.
				let new_color
				switch ( format ) {
					case 'rgba':
						new_color = color.toRGBA()
						break
					case 'hex':
						new_color = color.toHEXA()
						break
					case 'hsva':
						new_color = color.toHSVA()
						break
					case 'hsla':
						new_color = color.toHSLA()
						break
					case 'cmyk':
						new_color = color.toCMYK()
						break
					default:
						new_color = color.clone()
				}
				return new_color
			}
		},
	},
)
