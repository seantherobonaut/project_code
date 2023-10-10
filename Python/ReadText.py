#Program to read text data from a file

#ReadText.py

def main():

	'''
	#Open file for reading
	infile = open("Games.txt", 'r')

	#Process data and update file
	print("1) Reading text data using read() function: ")

	#Read all the contents in one shot
	fileContents = infile.read()

	print("Type of fileContents = ", type(fileContents))

	print(fileContents)

	#Close file
	infile.close()


	infile = open("Games.txt", 'r')


	print("2) Reading text file using read(number) function")

	s1 = infile.read(4)
	print(s1)

	s2 = infile.read(10)
	print(s2)

	s3 = infile.read(8)
	print(s3)

	infile.close()


	infile = open("Games.txt", 'r')

	print("3) Reading file contents using readline() function")

	#readline() function reads a string of characters ending
	#with \n
	line1 = infile.readline().rstrip()
	print(line1)

	print(repr(line1))

	line2 = infile.readline().rstrip()
	print(line2)

	infile.close()
	'''
	infile = open("Games.txt", 'r')

	print("4) Reading file contents using readlines() function")

	lineList = infile.readlines()

	print(lineList)

	lineList2 = []
	for element in lineList:
		lineList2.append(element.rstrip())


	print(lineList2)

	infile.close()

#Call main
main()