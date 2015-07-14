@echo off

set target=javaScript
del /f /s /q %target%
mkdir %target%
cd %target%
mkdir example
xcopy /y /s d:\users\jang\books\%target%\example example
mkdir download
xcopy /y /s d:\users\jang\books\%target%\download download
cd ..

del javaScript\example\image\vivian.jpg
del javaScript\example\image\lin.jpg

set target=asp
del /f /s /q %target%
mkdir %target%
cd %target%
mkdir example
xcopy /y /s d:\users\jang\books\%target%\example example
mkdir download
xcopy /y /s d:\users\jang\books\%target%\download download
cd ..

set target=wsh
del /f /s /q %target%
mkdir %target%
cd %target%
mkdir example
xcopy /y /s d:\users\jang\books\%target%\example example
mkdir download
xcopy /y /s d:\users\jang\books\%target%\download download
cd ..