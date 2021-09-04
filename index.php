<html>
<body>
<?php
  $iurl = "http://169.254.169.254/latest/meta-data/instance-id";
  $iid = file_get_contents($iurl);
  $aurl = "http://169.254.169.254/latest/meta-data/placement/availability-zone";
  $azone = file_get_contents($aurl);
  $ipurl = "http://169.254.169.254/latest/meta-data/local-ipv4";
  $lip = file_get_contents($ipurl);
?>
			<center>
				<h3>EC2 Instance ID: <?php echo $iid; ?></h3>
				<h3>Availability Zone: <?php echo  $azone; ?></h3>
				<h3>Private IP: <?php echo  $lip; ?></h3>
			</center>
</body>
</html>
