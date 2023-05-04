@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../maestroerror/php-heic-to-jpg/bin/heicToJpg
php "%BIN_TARGET%" %*
