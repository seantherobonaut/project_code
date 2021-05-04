import glob,os 

'''
    Rename all files in a folder
    TODO allow arguments to this file
'''

#Find all matching file names in the target directory and change them
def renameFile(rootDir,nameMatch,nameReplace):
    os.chdir(rootDir)
    for fileName in glob.glob("*"+nameMatch+"*"):
        newName = fileName.replace(nameMatch,nameReplace)
        os.rename(rootDir+fileName, rootDir+newName)

def main():
    dir_path = os.path.dirname(os.path.realpath(__file__))+'/'
    renameFile(dir_path,"_"," ")

main()

