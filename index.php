<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Remote Job Portal</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Exo|Montserrat+Alternates|Russo+One" rel="stylesheet">
		<link rel="stylesheet" href="style.css">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
	</head>
	<body>

			<div class="jumbotron">
					<h1 class="heading">Remote Jobs Portal</h1>
			</div>
			<div class="container">
			<h2 class="bottom-line">Get the latest job posts, here, and headstart your career now!</h2>
			<form method="get">
				<input class="form-control form-control-lg bottom-line" type="text" name="tag" placeholder="Search for your jobs based on your skills">
				<a role="button" class="btn btn-info bottom-line" href="./">Latest Jobs</a>
				<a role="button" class="btn btn-info bottom-line" href="?tag=marketing">Marketing</a>
				<a role="button" class="btn btn-info bottom-line" href="?tag=dev">Software Development</a>
				<a role="button" class="btn btn-info bottom-line" href="?tag=support">Customer Support</a>
				<a role="button" class="btn btn-info bottom-line" href="?tag=design">Designing and UI</a>
				<a role="button" class="btn btn-info bottom-line" href="?tag=non-tech">Non Tech Jobs</a>
			</form>
			<table class="table">
				<thead>
					<th>Company</th>
					<th>Position</th>
					<th>Link</th>
				</thead>
				<tbody>
					<?php
					$tag = "";
					if( isset($_GET["tag"])) {
									$lcase = preg_replace("/[^a-zA-Z0-9\s]/", "-", strtolower($_GET["tag"]));
									$tags = explode(" ",$lcase);
									if( isset($tags[0]) )
									$tag = $tags[0].'-';
					}
									$json = file_get_contents('https://remoteok.io/remote-'.$tag.'jobs.json');
									$data = json_decode($json,true);
									$len = count($data);
									for ($i=0;$i<$len;$i++) {
					?>
									<tr>
										<td><?php echo $data[$i]['company']?></td>
										<td><?php echo $data[$i]['position']?></td>
										<td><a role="button" class="btn btn-success" target="_blank" href="<?php echo $data[$i]['url']?>">Apply Now</a></td>
								  </tr>
					<?php
						}
					 ?>
				</tbody>
			</table>
		</div>
	</body>
</html>
