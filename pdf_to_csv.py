import csv
import fitz
from pprint import pprint
file = input("File Name : ")

out = file+'csv'
writer = csv.writer(open(out,'w',newline=''))

doc = fitz.open(file) # open document

for i in range(0,len(doc)):
    page = doc[i] # get the 1st page of the document
    tabs = page.find_tables() # locate and extract any tables on page
    if tabs.tables:  # at least one table found?
        writer.writerows(tabs[0].extract())
