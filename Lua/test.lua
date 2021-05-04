--[ This is my first program in lua! --]

--[ While --]
local count=1
while(count<10)
do
    io.write("Hello world!\n")
    count=count+1
end

--[ Do while --]
local a = 10
repeat
   print("value of a:", a)
   a = a + 1
until( a > 15 )

--[ For --]
for i = 10,1,-1 
do 
   print(i) 
end

print(type(count))