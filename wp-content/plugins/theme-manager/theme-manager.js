function activated(theme) {
	alert(theme + ' is activated and cannot be deleted.');
}
function gcssync(whichway)
{
 var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("gcs_sync_results").innerHTML = this.responseText;
document.getElementById("gcs_sync_results").style.display = 'block';
    }
  };
xhttp.open("GET", "theme-manager-commands.php?Direction="+whichway+"&GCSsync=1", true);
xhttp.send();
}
