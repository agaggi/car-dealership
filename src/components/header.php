<?php
	$links = array();

	// Returns 0 if the strings match
	if (strcmp($_SESSION['role'], "Employee") === 0) {

		array_push($links, "<a class='no-dec' href='sales.php'>View Sales</a>");
		array_push($links, "<a class='no-dec' href='create_listing.php'>Create Listing</a>");
	}

	array_push($links, "<a class='no-dec' href='listings.php'>View Listings</a>");
	array_push($links, "<a class='no-dec' href='profile.php'>My Profile</a>");
	array_push($links, "<a class='no-dec' href='../authentication/logout.php'>Logout</a>");
?>

<header>
	<nav>
		<h3 style="padding-right: 10px">
			<a class="no-dec" href="index.php">Database Dealership</a>
		</h3>

		<div>CS 550 - Database Concepts</div>

		<ul id="nav-items">
			<li><a class="no-dec" href='index.php'>Home</a></li>

			<?php
				foreach ($links as $link) {

					echo "<li style='padding-left: 15px'>$link</li>";
				}
			?>
		</ul>
	</nav>
</header>
