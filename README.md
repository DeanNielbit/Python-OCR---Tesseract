# Python-OCR---Tesseract
 OCR - Browser - Windows / Linux / Mac Version 
################################################
//INSTALL BINARY
################################################

On Linux
//-----------------------------------------------
sudo apt-get update
sudo apt-get install libleptonica-dev 
sudo apt-get install tesseract-ocr tesseract-ocr-dev
sudo apt-get install libtesseract-dev

On Mac
//-----------------------------------------------
brew install tesseract

On Windows
//-----------------------------------------------
download binary from https://github.com/UB-Mannheim/tesseract/wiki. then add to your script.

32BIT WINDOWS
pytesseract.pytesseract.tesseract_cmd = 'C:\Program Files (x86)\Tesseract-OCR\tesseract.exe' 

64BIT WINDOWS
pytesseract.pytesseract.tesseract_cmd = 'C:\Program Files\Tesseract-OCR\\tesseract.exe'


//-----------------------------------------------
Then you should install python package using pip:
//-----------------------------------------------
pip install tesseract
pip install tesseract-ocr
pip install pytesseract
pip install Pillow

#################################################
//EXTRA
#################################################
Issue on Windows. I tried to update the environment variables for the path of tesseract which did not work.
What worked for me was to modify the pytesseract.py which can be found at the path C:\Program Files\Python37\Lib\site-packages\pytesseract or usually in the C:\Users\YOUR USER\APPDATA\Python
I changed one line as per below:

#tesseract_cmd = 'tesseract' 
#tesseract_cmd = 'C:\Program Files\Tesseract-OCR\\tesseract.exe'
Note I had to put an extra \ before tesseract as Python was interpreting same as \t and you will get the below error message:

pytesseract.pytesseract.TesseractNotFoundError: C:\Program Files\Tesseract-OCR esseract.exe is not installed or it's not in your path
