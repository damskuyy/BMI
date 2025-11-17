@echo off
REM Test script untuk submit form gallery create dengan curl

setlocal enabledelayedexpansion

REM Prepare test image
set TESTIMAGE=c:\laragon\www\BMI\public\be\test_image_for_upload.jpg

REM URL dan credentials (sesuaikan dengan aplikasi Anda)
set URL=http://localhost:8080/bmi/admin/gallery_be
set TITLE=Test Gallery From cURL
set DESC=Testing upload via cURL command
set DATE=2025-11-14

echo Testing gallery form submission with curl...
echo Image file: %TESTIMAGE%

REM First, kita perlu mendapatkan CSRF token
echo Getting CSRF token...
for /f "tokens=*" %%a in ('curl -s "http://localhost:8080/bmi/admin/gallery_be/create" ^| findstr /C:"csrf" ^| findstr /C:"value" ^| findstr /oE "value=\"[^\"]*\"" ^| findstr /oE "[a-f0-9]{40}"') do (
    set CSRF=%%a
)

if "!CSRF!"=="" (
    echo Failed to get CSRF token
    exit /b 1
)

echo CSRF token: !CSRF!

REM Submit form
echo Submitting form...
curl -X POST "http://localhost:8080/bmi/admin/gallery_be" ^
    -H "X-CSRF-TOKEN: !CSRF!" ^
    -H "Accept: application/json" ^
    -F "title=%TITLE%" ^
    -F "description=%DESC%" ^
    -F "event_date=%DATE%" ^
    -F "images[]=@%TESTIMAGE%" ^
    -F "display_mode[]=col-6" ^
    -F "center_image[]=0" ^
    -v

echo Done!
