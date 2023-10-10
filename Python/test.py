

# number = 0;
# while(number <= 0):
# 	try:
# 		number = float(input("Please enter a dollar amount: "))			
# 	except:
# 		print("YOU FAIL!!!")


success = False
while success == False:
	fileName = input("Please enter a file name: ")
	try:
		file = open(fileName, 'r')	
		success = True
	except Exception as e:
		print("File not found. Try again.")
	


	


# myPets = ["Arthur", "Peaches", "Tahoe", "Travis", "Cody"]

# for output in myPets:
# 	print(output)
	


'''
file = open("test.txt", 'r')
lineReader = file.readlines()
lineArray = []

for line in lineReader:
	lineArray.append(int(line))

file.close()

result = max(lineArray)
print(result)
print(lineArray.index(result))
'''


# 	item = line.split(',')
# print item[0]



'''
*magic* file becomes Array!

Array1
 (0)   Customer  $
 (1)   Customer  $$
 (2)   Customer  $$$
 (3)   Customer  $$$$
 (4)   Customer  $$$$$


For loop(0-4)
	variableCustomer, variableMoney = array(INDEX).split
	array2.append(variableCustomer)
	array3.append(variableMoney)

CustomerArray
	Customer
	Customer
	Customer
	Customer

MoneyArray
	 $$$
	 $$$
	 $$$
	 $$$


'''