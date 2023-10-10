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
/*
You can't delete objects in javascript, the garbage collector collects them.
You can delete memory by setting all references to null.


shallow copy
var newObject = JSON.parse(JSON.stringify(oldObject));
es6//
Object.assign({}, obj);
*/
	//Wrap the element in a div where the content sits on the left, and the delete button sits on the right
	// function addDeleteButton(element)
	// {
	// 	let newDiv = document.createElement("div");
	// 	newDiv.appendChild(element);
		
	// }


	//IDEA - Maybe have a class that manages all 4 functions? that call class methods? ...or just 4 seperate functions
		//-- the reason behind this is to you can say delete(#) or delete(htmlID) and it will auto delete the array item and HTML item. 

	//Fake data array from server
	let data = ["one"];
	data.push("two");
	data.push("three");
	data.push("four");

	let output = document.getElementById("output");
	let comments = [];

	function deleteComment(obj)
	{
		//TODO extract ID
		let text = obj.innerText;
		console.log("deleted: "+text);
		obj.parentNode.removeChild(obj);
	}	

	function createComment(content)
	{
		//Fill comments array with html elements created from "data"
		let newComment = document.createElement("div");
		comments.push(newComment);

		newComment.innerText = content+"!!!";
		newComment.className = "comments";

		//Add delete button to each element
		//comments[i] = addDeleteButton(comments[i]);

		//Add event listener to each button... this could probably go in the addDeleteButton function...
		newComment.addEventListener("click", function()
		{
			deleteComment(this);
		});

		output.appendChild(newComment);
		newComment = null;		
	}

	for(let i=0; i<data.length; i++)
	{
		createComment(data[i]);
	}	


	let myForm = document.getElementById("newComment");
	let myInput = document.getElementById("newInput");
	myForm.addEventListener("submit", function(event)
	{
		event.preventDefault();
		let content = myInput.value;	
		
		if(content != "")
		{
			//preserve whitespace			
			while(content != content.replace(" ", '\u00A0'))
				content = content.replace(" ", '\u00A0');

			createComment(content);
		}

		myForm.reset(); //or you could use myInput.value = ""
	});


	/*let xhttp = new XMLHttpRequest();
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

		//maybe this didn't work because the form was reset before the ajax request was sent???

		xhttp.open("POST", "/newComment", true); //this works if you erase the javascript
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("comment="+content);
	});*/
	
	//BUG There's currently a weird issue where data isn't being passed by the javascript forms, only normal raw html forms are


/*
base class has htmlID and htmlClass

each class has an update() function where it pulls information from the server 

Element - job: hold and display data
	htmlElement<>
	htmlID
	htmlClass
	constructor(id?)
	update() popup button, or whatever - passes htmlID to another object, and gets a response and updates what's displayed on page, or logs error to console



Maybe updating each element has a base function in common so it doesn't have to be copied all over the place.
...

Maybe the basic thing you click on calls a larger function down below but passes its id along so when it is updated, it updates the right element, or delets it	

The JS dom elements just exist and are structure, behavior is decided elsewhere. Same structures, different behaviors as seperate classes?

Like all these new items, are given the function onclick(runSomeOtherFunction(thisObjectCalling.id)
*/



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