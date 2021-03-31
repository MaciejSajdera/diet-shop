window.addEventListener("DOMContentLoaded", event => {
	const mapCanvas = document.querySelectorAll(".map_canvas");

	mapCanvas.forEach(canvas => {
		function initialize() {
			let map;
			let bounds = new google.maps.LatLngBounds();
			let mapOptions = {
				mapTypeId: "roadmap",
				streetViewControl: true
			};

			// Display a map on the page
			map = new google.maps.Map(canvas, mapOptions);
			map.setTilt(45);

			// Multiple Markers
			let markers = [["Kielce, Staszica 14a", 54.402111, 18.5886565]];

			// Info Window Content
			// let infoWindowContent = [
			// 	[
			// 		'<div class="info_content">' +
			// 			'<img width="200" height="71" src="https://blossomitdev.usermd.net/wp-content/uploads/2020/11/cropped-venus-logo.png" class="custom-logo" alt="JL Poradnia" srcset="https://blossomitdev.usermd.net/wp-content/uploads/2020/11/cropped-venus-logo.png 200w, https://blossomitdev.usermd.net/wp-content/uploads/2020/11/cropped-venus-logo-64x23.png 64w" sizes="(max-width: 200px) 100vw, 200px">' +
			// 			"<h3>Venus, Kielce, Staszica 14a</h3>" +
			// 			"</div>"
			// 	]
			// ];

			// Display multiple markers on a map
			let infoWindow = new google.maps.InfoWindow(),
				marker,
				i;

			// Loop through our array of markers & place each one on the map
			for (i = 0; i < markers.length; i++) {
				let position = new google.maps.LatLng(markers[i][1], markers[i][2]);
				bounds.extend(position);
				marker = new google.maps.Marker({
					position: position,
					map: map,
					title: markers[i][0]
				});

				// Allow each marker to have an info window
				google.maps.event.addListener(
					marker,
					"click",
					(function(marker, i) {
						return function() {
							infoWindow.setContent(infoWindowContent[i][0]);
							infoWindow.open(map, marker);
						};
					})(marker, i)
				);

				// Automatically center the map fitting all markers on the screen
				map.fitBounds(bounds);
			}

			// Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
			let boundsListener = google.maps.event.addListener(
				map,
				"bounds_changed",
				function(event) {
					this.setZoom(14);
					google.maps.event.removeListener(boundsListener);
				}
			);
		}

		initialize();
	});
});
