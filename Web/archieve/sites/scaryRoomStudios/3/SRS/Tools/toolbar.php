<?php
	//TODO idea have all templates extend from a base template class to have only one static method create database instances to improve efficiency just like the database object already does

/*
	start using db->lastID() everywhere
	create a request proxy to add posts and one to delete posts
	create types of posts
	create more types of templates
	fix up nested templates and test!!!

	get some styling done for automatic style creation
*/
	/*
		start using requestProxies

		have jquery toggle visibility of forms for adding and subtracting pages

		add new page
			Name(for menu)
			type (dropdown internal/external)
			URL(for page)
			rootTemplate (dropdown)
			submit
			
		remove this page...js alert() "do you wish to remove just this page or all content associated with it?"
			"warning...clicking yes will delete all content and its associated subcontent"
	*/


	Headers::newcss(Config::$path['appLocal'].'Tools/toolbar_style.css');

	/* print out notifications from server as a js alert */
	if(!empty($_SESSION['operationStatus']))
	{
		echo "<script type=\"text/javascript\">$(document).ready(function(){alert(\"".$_SESSION['operationStatus']."\");});</script>"; 
		$_SESSION['operationStatus'] = NULL;
		unset($_SESSION['operationStatus']);
	}
?>
<div class="toolBar">
	<div style="max-width: 1000px;margin:auto;">
		<p style="float: right">Welcome back <?php echo $_SESSION['user_data']['username'];?>!</p>
		<br style="clear: right">
		<p style="text-align: left">Tools:</p>
		<ul>
			<?php
				if($_SESSION['user_data']['rank'] == 'admin')
					require 'toolbar_admin.php';
			?>
		</ul>

		<!-- This is where the full page popup happens to enter data easier. It is activated by calling javaascript functions below -->
		<div id="alertPopup">
			<div><!-- this is the wrapper for all forms -->

				<div style="display: inline-block;">
					<div style="height:25px">&nbsp;</div>
					<div id="alertBox">
						<!-- Have javascript insert forms here -->
					</div>
				</div>
				<!-- This is the close button -->
				<div style="display: inline-block;vertical-align: top">
					<button onclick="closePopup();" style="background-color: rgba(0,0,0,0);padding:0px;font-size: 0px"><img style="height:25px;display: inline-block;margin: 0px" src="<?php echo Config::$path['appLocal'];?>Tools/remove.png"></button>					
				</div>

			</div>
		</div>
		<script type="text/javascript">
			var CreateForms = function()
			{
				this.init = function()
				{
					var form = document.createElement("form");
					
					form.appendChild(document.createTextNode("User!:"));
					var inputUserName = document.createElement("input");
					inputUserName.setAttribute("type", "text");
					inputUserName.setAttribute("name", "username");
					form.appendChild(inputUserName);

					form.appendChild(document.createElement("br"));

					form.appendChild(document.createTextNode("Pass!:"));
					var inputPassword = document.createElement("input");
					inputPassword.setAttribute("type", "password");
					inputPassword.setAttribute("name", "pass");
					form.appendChild(inputPassword);
					
					form.appendChild(document.createElement("br"));

					var submit = document.createElement("input");
					submit.setAttribute("type", "submit");
					submit.setAttribute("value", "release frogs!");
					form.appendChild(submit);

					var wrapper = document.createElement("div");
					wrapper.appendChild(form);
					var output = wrapper.innerHTML;

					return output;
				}
			};
			var obj1 = new CreateForms;

			/*------------- Below are operations for the popup -------------------*/

			function openPopup(popupHTML)
			{
				document.getElementById("alertPopup").style.display = "block";
				document.getElementById("alertBox").innerHTML = popupHTML;
			}

			function closePopup()
			{
				document.getElementById("alertBox").innerHTML = "";
				document.getElementById("alertPopup").style.display = "none";
			}

			//Only clicking outside the popup box will close it
			document.getElementById("alertPopup").addEventListener("click", function(){closePopup();});
			document.querySelector("#alertPopup > div").addEventListener("click", function(e){e.stopPropagation();});

			//Close the popup if the escape key (key27) is pressed
			document.addEventListener("keydown", function(e)
			{
    			if(document.getElementById("alertPopup").style.display != "none")
			    	if(e.keyCode == 27)
			        	closePopup();
			});

			//YAY!
			//openPopup(obj1.init());

		</script>
	</div>
</div>
