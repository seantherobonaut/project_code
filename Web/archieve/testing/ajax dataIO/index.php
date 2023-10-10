	<form class="dataForm" id="DF1" method="get" action="SRS/dataRequestProxies/paragraphRequestProxy.php" style="border:1px solid blue;display: inline-block;">
		Enter Text:
		<input type="text" name="updatePara" placeholder="Text..." autocomplete="off">
		<input type="hidden" name="paraID" value="1">
		<input type="hidden" name="redirectPage" value="home">
		<div style="display: none" class="targetElement">#para1</div> <!-- make this an input tag with value and disabled...if not there dont' update content..console.log() -->
		<input id="DF1submit" type="submit" value="Update">
	</form>
	<!-- 
		basically build a really smart form handler
		for file uplaod and normal data stuff

		//TODO
		Just make simple ajax form handlers with names like fileFormUpload and stringFormUpload or mix or someting and handle fancy checks later
		form handlers handle data and check for fields...there will be separet classnames and handlers for how they behave..popup, disappear...etc
		//all forms reset data on submit
	 -->
	<script>
		$(".dataForm").each(function()
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
		});

/*new*/
$(function ajaxform_reload() {
$(document).on("submit", ".ajax_forms", function (e) {
    e.preventDefault();
    var url = $(this).attr('action');
    $.ajax({
        type: 'post',
        url: url,
        data: $(this).serialize(),
        success: function (data) {
            // DO WHAT YOU WANT WITH THE RESPONSE
        }
    });
});
});
	</script>