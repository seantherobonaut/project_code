# someone enters 4, this is now 4-1
dimensions = 4

row = 0
column = 0
success = False
while success == False:
	try:
		row,column = eval(input("Enter the table element (row,col): "))
		row -= 1
		column -= 1
		if (row>=0 and row<=dimensions) and (column>=0 and column<=dimensions):
			success = True
		else:
			print("You must coordinates between 1 and ",dimensions+1)		
	except:
		print("Coordinates must be comma seperated numbers!")
