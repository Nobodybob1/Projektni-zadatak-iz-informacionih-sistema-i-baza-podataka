<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Projektovanje informacionih sistema i baza podataka
Projekat iz predmeta PISIBS na temu Turistička agencija, odlučili smo se za izradu web aplikacije pomoću Laravel <i>framework</i>-a.

## Instrukcije za pokretanje aplikacije

- Potrebno je preuzeti <i>Composer</i> sa linka https://getcomposer.org/download/ za vaš operativni sistem.
- Pomoću sledeće sekvence komandi se povezati i preuzeti projekat sa GitHub-a:
    - <i>git init</i>
    - <i>git remote add željeno_ime link ka našem repozitorijumu </i>
    - <i>git pull željeno_ime main</i>
- Posle preuzimanja promeniti ime .env.example fajla u .env
- U komandnoj liniji uneti "composer install" 

Sada postoje dva načina za pokretanje aplikacije
<table border="0">
 <tr>
    <td><b style="font-size:30px">Pokretanje pomoću Xampp-a</b></td>
    <td><b style="font-size:30px">Pokretanje pomoću Docker-a</b></td>
 </tr>
 <tr>
    <td>-Pretpostavka je da već imate instaliran i funkcionalan XAMPP</td>
    <td>Lorem ipsum ...</td>
 </tr>
 <tr>
    <td>    -Pokrenuti Apache i MySQL u XAMPP kontrolnom panelu</td>
    <td>Lorem ipsum ...</td>
 </tr>
  <tr>
    <td>    Pokrenuti sledecu sekvencu komandi:</td>
    <td>Lorem ipsum ...</td>
 </tr>
 <tr>
    <td>    php artisan serve
            zatim u drugom terminalu:
            php artisan key:generate
            php artisan migrate:fresh
            php artisan db:seed
            </td>
    <td>Lorem ipsum ...</td>
 </tr>
</table>




warning: in the working copy of 'docker/8.2/script.sh', LF will be replaced by CRLF the next time Git touches it