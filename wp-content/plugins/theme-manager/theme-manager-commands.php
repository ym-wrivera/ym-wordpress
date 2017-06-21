<?php
	//IF this is a GCSSync and the direction is defined.
	if(isset($_GET['GCSsync']) && isset($_GET['Direction']))
	{
		$SyncDirection = $_GET['Direction'];
		if($SyncDirection === 'pull'){
			$Executecommand = shell_exec("touch /data/sync_check_from.txt");
			echo $Executecommand;
			echo "Syncing any new or missing theme files from Google Cloud Storage. This process can take up to 5 minutes.<BR> Feel free to navigate away from this page. The process will continue in the background.";
		}
		if($SyncDirection === 'push'){
			$Executecommand = shell_exec("touch /data/sync_check_to.txt");
			echo $Executecommand;
			echo "Syncing theme files to GCS, which will in turn be synchronized to all other WP nodes. This process will take between 5-10 minutes. Feel free to navigate away from this page while this process runs.";
		}
	}
?>