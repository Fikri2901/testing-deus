<!doctype html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css"
		href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
	<link rel="stylesheet" type="text/css"
		href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

	<title>Test Deus</title>

	<script>
		function initialize_map() {
			var myOptions = {
				zoom: 4,
				mapTypeControl: true,
				mapTypeControlOptions: {
					style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
				},
				navigationControl: true,
				navigationControlOptions: {
					style: google.maps.NavigationControlStyle.SMALL
				},
				mapTypeId: google.maps.MapTypeId.ROADMAP
			}
			map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
		}

		function initialize() {
			if (geo_position_js.init()) {
				document.getElementById('latitude').value = "Receiving...";
				geo_position_js.getCurrentPosition(show_position, function () {
					document.getElementById('latitude').value = "Couldn't get location"
				}, {
					enableHighAccuracy: true
				});

				document.getElementById('longitude').value = "Receiving...";
				geo_position_js.getCurrentPosition(show_position, function () {
					document.getElementById('longitude').value = "Couldn't get location"
				}, {
					enableHighAccuracy: true
				});
			} else {
				document.getElementById('latitude').value = "Functionality not available";
				document.getElementById('longitude').value = "Functionality not available";
			}
		}

		function show_position(p) {
			document.getElementById('latitude').value = p.coords.latitude.toFixed(2);
			document.getElementById('longitude').value = p.coords.longitude.toFixed(2);

			var pos = new google.maps.LatLng(p.coords.latitude, p.coords.longitude);
			map.setCenter(pos);
			map.setZoom(14);

			var infowindow = new google.maps.InfoWindow({
				content: "<strong>Oke</strong>"
			});

			var marker = new google.maps.Marker({
				position: pos,
				map: map,
				title: "You are here"
			});

			google.maps.event.addListener(marker, 'click', function () {
				infowindow.open(map, marker);
			});
		}

	</script>

	<script src="<?= base_url() ?>/assets/js/geo.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

	<style type="css">
		tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
    </style>

</head>

<body onload="initialize_map();initialize();">

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">Test</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="<?= base_url() ?>">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Link</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
							data-bs-toggle="dropdown" aria-expanded="false">
							Dropdown
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="#">Action</a></li>
							<li><a class="dropdown-item" href="#">Another action</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a class="dropdown-item" href="#">Something else here</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link disabled">Disabled</a>
					</li>
				</ul>
				<form class="d-flex">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success" type="submit">Search</button>
				</form>
			</div>
		</div>
	</nav>
