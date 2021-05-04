<!DOCTYPE html>
<html>
	<head>
		<script>
			function progressHandler(event)
			{
				document.getElementById("bytesProgress").innerHTML = +event.loaded+" / "+event.total;
			}
			
			function uploadFile()
			{
				var ajax = new XMLHttpRequest();
				ajax.upload.addEventListener("progress", progressHandler, false);
				
				var formdata = new FormData();
				var file = document.getElementById("file1").files["0"];
				// alert(file.name+" | "+file.size+" | "+file.type); 
				formdata.append("file1", file);
				
				ajax.open("POST", "file_upload_parser.php");
				ajax.send(formdata);
			}
		</script>
	</head>
	<body>
		Upload a file:
		<form enctype="multipart/form-data" method="post">
			<input type="file" name="file1" id="file1"><br>
			<input type="button" value="Upload File" onclick="uploadFile()">
			<p id="bytesProgress"></p>
		</form>
	</body>
</html>