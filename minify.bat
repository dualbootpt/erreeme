echo off
echo Minifying css files
java -jar F:\DEV\yuicompressor-2.4.7\build\yuicompressor-2.4.7.jar -o menu-min.css menu.css
java -jar F:\DEV\yuicompressor-2.4.7\build\yuicompressor-2.4.7.jar -o erreeme-min.css erreeme.css
java -jar F:\DEV\yuicompressor-2.4.7\build\yuicompressor-2.4.7.jar -o bannerslideshow-min.css bannerslideshow.css
java -jar F:\DEV\yuicompressor-2.4.7\build\yuicompressor-2.4.7.jar -o editmode-min.css editmode.css
java -jar F:\DEV\yuicompressor-2.4.7\build\yuicompressor-2.4.7.jar -o editmode-min.js editmode.js
java -jar F:\DEV\yuicompressor-2.4.7\build\yuicompressor-2.4.7.jar -o menu-min.js menu.js
java -jar F:\DEV\yuicompressor-2.4.7\build\yuicompressor-2.4.7.jar -o utils-min.js utils.js
REM echo Minifying js files
echo Nao faz minify do JS porque esta dentro de uma template
REM java -jar F:\DEV\yuicompressor-2.4.7\build\yuicompressor-2.4.7.jar -o bannerslideshow.ambientes-min.js bannerslideshow.ambientes.js
REM java -jar F:\DEV\yuicompressor-2.4.7\build\yuicompressor-2.4.7.jar -o bannerslideshow.coleccao-min.js bannerslideshow.coleccao.js
REM java -jar F:\DEV\yuicompressor-2.4.7\build\yuicompressor-2.4.7.jar -o bannerslideshow.novidades-min.js bannerslideshow.novidades.js
echo NO AMBIENTE DE PRODUCAO: FAZER RENAME DOS FICH min-
pause
