#Program to display social media users in 2018 and 2023 for a selected country

INPUT_FILE = "SocialMediaUsers.txt"


def main():

	#Get user input
	country = input("Enter country: ")

	try:
		infile = open(INPUT_FILE, 'r')

	except IOError as ioe:
		print(ioe)

	else:
		try:
			line, found = getSocialMediaUsers(infile,country)
			displayOutput(line,found)

		finally:
			infile.close()

def getSocialMediaUsers(infile,country):

	found = False 

	line = infile.readline()

	while(line != ''):

		found = searchCountry(line.rstrip(), country)

		if(found):
			break

		#if not found, read next line
		line = infile.readline()

	return line, found

def searchCountry(line, searchString):

	lineList = line.split(',')

	if (lineList[0] == searchString):
		return True
	else:
		return False

def displayOutput(line, found):
	if(found):
		data = line.rstrip().split(',')

		print("Social Media Users in: %s\n2018: %s Millions\n2023: %s Millions"\
			%(data[0], data[1], data[2]))
	else: 
		print("Data not found for the given country")

main()
