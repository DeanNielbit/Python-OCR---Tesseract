#!/usr/bin/env python3.5
import os 
import sys
import uuid

from PIL import Image
import pytesseract
#uncomment for use on windows system
#pytesseract.pytesseract.tesseract_cmd = 'C:\Program Files\Tesseract-OCR\\tesseract.exe'

filenameimage = sys.argv[1]
filenametext = sys.argv[2]

def process_image(iamge_name, lang_code):
	return pytesseract.image_to_string(Image.open(iamge_name), lang=lang_code)

def print_data(data):
	print(data)

def output_file(filename, data):
	file = open('upload/'+filename, "w+")
	file.write(data)
	file.close()

def main():
	data_eng = process_image(filenameimage, "eng")
	print_data(data_eng)
	output_file(filenametext, data_eng)

if  __name__ == '__main__':
	main()
