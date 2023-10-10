<style type="text/css">
	body {padding: 5px;}
	#wrapper
	{
		border-radius: 7px;
		border:1px solid #ccc;
		padding: 20px;
		width: 100%;
		max-width: 800px;
		margin: auto;
	}
	.comments
	{
		padding:7px 10px;
		border-left:2px solid #07b;
		margin-bottom: 10px;		
		background-color: #f7f7f7;
		border-radius: 0px 10px 10px 0px;
	}

	#newComment
	{
		border:1px solid black;
		text-align: right;
	}
</style>
<div id="wrapper">
	<div id="output"></div>
	<div style="border:1px solid green; width: 300px">
		<form id="newComment" class="dataform" method="POST" action="/newComment">
			<input id="newInput" style="border-top-left-radius: 10px; border-bottom-left-radius: 10px" type="text" name="comment" placeholder="New comment...">
			<input style="border-top-right-radius: 10px; border-bottom-right-radius: 10px" type="submit" value="Submit">
		</form>		
	</div>
</div>
<script type="text/javascript">
	let xhttp = new XMLHttpRequest();
	let output = document.getElementById('output');

	xhttp.onreadystatechange = function()
	{
		if(this.readyState == 4 && this.status == 200)
		{
			let comments = JSON.parse(this.responseText);
			comments.forEach(function(text)
			{
				let comment = document.createElement('div');	
				comment.innerText = text;
				comment.className = 'comments';
				output.appendChild(comment);
				comment = null;
			});			
		}
	};

	function loadPage()
	{
		xhttp.open("GET", "/comments/home", true);
		xhttp.send();		
	}
	loadPage();

	let myForm = document.getElementById("newComment");
	let myInput = document.getElementById("newInput");
	myForm.addEventListener("submit", function(event)
	{
		let content = "";
		//event.preventDefault();
		console.log(myInput.value);
		content = myInput.value;
		myForm.reset(); //or you could use myInput.value = ""

		xhttp.open("POST", "/newComment", true); //this works if you erase the javascript
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("comment="+content);
	});

	//idea: rather than refreshing all content each time you make 1 update, just update the item you updated ONLY if you get a response back.
	//If it has been deleted, don't allow the update and remove it from the DOM
	//Make the forms bootstrap modals maybe? Or if not, have them purely created in js, holding all the inputs rather than scanning for them. 
	//Maybe the js objects getComments and upDateComment communicate with eachother directly and update dom 




	// let form = document.getElementById("newComment");
	// form.addEventListener("submit", function(event)
	// {
	// 	event.preventDefault();
	// 	let inputs = this.childNodes;
	// 	inputs.forEach(function(index)
	// 	{
	// 		console.log(index.tagName);
	// 	});
	// });


	//prevent default, trigger refresh of comments (user jquery for serialize only)

/*		$(".dataForm").each(function()
		{
			var formID = $(this).attr("id"); //alert there must be an id set, must be either get or post!, 
			var formName = "#"+formID;
			var formMethod = $(formName).attr("method");
			var formAction = $(formName).attr("action");
			var formTarget = $(formName+" > .targetElement").text();
			$(formName).on("submit", function(event)
			{
				var formData = $(formName).serialize();
				document.getElementById(formID).reset(); //clear the form so people can't spam it
				event.preventDefault();
				$.ajax(
				{
					url: formAction,
					type: formMethod,
					data: formData,
					dataType: 'text',
					success: function(response)
					{
						//TODO get back a json_array that says "not logged in, data doesn't exist...etc" and have filename somethingAjaxRquest.php
						if(response != "")
						{
							if($(formTarget).prop("tagName").toLowerCase() != "input")
								$(formTarget).html(response);
							else
								$(formTarget).val(response);
						}
					}
				});
			});
		});	*/
</script>