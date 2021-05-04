		var teacher =
			{
				"cdelrio":
					{
						teacherID: "cdelrio",
						name: "Mrs. Del Rio",
						departmentID: "technology",
						department: "Technology",
						email: "cdelrio@eduhsd.k12.ca.us",
						extension: "000",
						about: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ornare interdum orci, cursus dictum ante molestie eu. Praesent dapibus nulla sed erat pellentesque mollis. Proin purus nisi, consectetur non suscipit nec, pharetra et nisi. Vivamus ac massa ante.",
						googledocs: "",
						//Classes Fall
						block1Fall: "Unknown",
						block2Fall: "DBTV",
						block3Fall: "Unknown",
						block4Fall: "Unknown",
						//Classes Spring
						block1Spring: "Unknown",
						block2Spring: "Unknown",
						block3Spring: "Unknown",
						block4Spring: "Unknown"
					},
					
				"ddemoff":
					{
						teacherID: "ddemoff",
						name: "Mrs. Demoff",
						departmentID: "technology",
						department: "Technology",
						email: "ddemoff@eduhsd.k12.ca.us",
						extension: "4405",
						about: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ornare interdum orci, cursus dictum ante molestie eu. Praesent dapibus nulla sed erat pellentesque mollis. Proin purus nisi, consectetur non suscipit nec, pharetra et nisi. Vivamus ac massa ante.",
						googledocs: "https://docs.google.com/folder/d/0B9BcMGSd2s88QnJDaUJnYk1wSzg/edit?usp=sharing",
						//Classes Fall
						block1Fall: "Chem. A",
						block2Fall: "Chem. A",
						block3Fall: "ICT",
						block4Fall: "Prep",
						//Classes Spring
						block1Spring: "Prep",
						block2Spring: "ICT",
						block3Spring: "Web Design",
						block4Spring: "ICT"
					},
				"ssager":
					{
						teacherID: "ssager",
						name: "Mrs. Sager",
						departmentID: "technology",
						department: "Technology",
						email: "ssager@eduhsd.k12.ca.us",
						extension: "000",
						about: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ornare interdum orci, cursus dictum ante molestie eu. Praesent dapibus nulla sed erat pellentesque mollis. Proin purus nisi, consectetur non suscipit nec, pharetra et nisi. Vivamus ac massa ante.",
						googledocs: "",
						//Classes Fall
						block1Fall: "Unknown",
						block2Fall: "Unknown",
						block3Fall: "Unknown",
						block4Fall: "Unknown",
						//Classes Spring
						block1Spring: "Unknown",
						block2Spring: "Unknown",
						block3Spring: "Unknown",
						block4Spring: "Unknown"
					}
			};
function getTitle(id)
	{	
		var information = teacher[id];
		
		document.write('<title>UMHS ' + information.name + '</title>');	
	}
function getTeacherName(id)
	{
		var information = teacher[id];
		
		document.write(information.name);	
	}
function getDepartment(id)
	{
		var information = teacher[id];
		
		document.write(information.department);	
	}
function getEmail(id)
	{	
		var information = teacher[id];
				
		document.write('<a href="mailto:' + information.email + '" target="_blank">');	
	}
function getPhoneNumber(id)
	{	
		var information = teacher[id];
		
		document.write("1-530-621-4003 Ext. " + information.extension);	
	}
function getDescription(id)
	{	
		var information = teacher[id];
		
		document.write(information.about);	
	}
function getGoogleDocs(id)
	{	
		var information = teacher[id];
		
		document.write('<a href="' + information.googledocs + '" target="_blank">');
		
	}
function getProfilePicture(id)
	{	
		var information = teacher[id];
		
		document.write('<img src="../../../../image/profile/' + information.departmentID + '/' + information.teacherID + '/profile.gif" alt="Profile Picture"; min-height="45%" height="45%">');
		
	}
function getBlock1Fall(id)
	{	
		var information = teacher[id];
		
		document.write(information.block1Fall);	
	}
function getBlock2Fall(id)
	{	
		var information = teacher[id];
		
		document.write(information.block2Fall);	
	}
function getBlock3Fall(id)
	{	
		var information = teacher[id];
		
		document.write(information.block3Fall);	
	}
function getBlock4Fall(id)
	{	
		var information = teacher[id];
		
		document.write(information.block4Fall);	
	}
function getBlock1Spring(id)
	{	
		var information = teacher[id];
		
		document.write(information.block1Spring);	
	}
function getBlock2Spring(id)
	{	
		var information = teacher[id];
		
		document.write(information.block2Spring);	
	}
function getBlock3Spring(id)
	{	
		var information = teacher[id];
		
		document.write(information.block3Spring);	
	}
function getBlock4Spring(id)
	{	
		var information = teacher[id];
		
		document.write(information.block4Spring);	
	}