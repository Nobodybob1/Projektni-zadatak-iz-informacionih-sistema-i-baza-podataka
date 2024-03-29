<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Projektovanje informacionih sistema i baza podataka
Projekat iz predmeta PISIBS na temu Turistička agencija, odlučili smo se za izradu web aplikacije pomoću Laravel <i>framework</i>-a.
<h3>Opis aplikacije</h3>
Aplikacija koja omugućuje brzu i laku pretragu destinacija za letovanje na svim kontinentima. <br>
Detaljan opis lokacija, turističkih atrakcija, laka rezervacija, e-mail obaveštenja i newsletter o najatraktivnijim destinacijama.


## Instrukcije za pokretanje aplikacije

- Potrebno je preuzeti <i>Composer</i> sa linka https://getcomposer.org/download/ za vaš operativni sistem.
- Pomoću sledeće sekvence komandi se povezati i preuzeti projekat sa GitHub-a:
    - <i>git init</i>
    - <i>git remote add željeno_ime link ka našem repozitorijumu </i>
    - <i>git pull željeno_ime main</i>
- Posle preuzimanja promeniti ime .env.example fajla u .env
- U komandnoj liniji uneti "composer install" 

Sada postoje dva načina za pokretanje aplikacije:
<table border="0">
 <tr>
    <td><b style="font-size:30px">Pokretanje pomoću Xampp-a</b></td>
    <td><b style="font-size:30px">Pokretanje pomoću Docker-a</b></td>
 </tr>
 <tr>
    <td>Pretpostavka je da već imate instaliran i funkcionalan XAMPP</td>
    <td>Potrebno je imati preuzet i konfigurisan Docker(https://www.docker.com/products/docker-desktop/) <br>
        za korisnike Windows OS potrebno je instalirati dodatno i WSL(https://learn.microsoft.com/en-us/windows/wsl/install)</td>
 </tr>
 <tr>
    <td>Pokrenuti Apache i MySQL u XAMPP kontrolnom panelu</td>
    <td>Pokrenuti Docker</td>
 </tr>
  <tr>
    <td>Pokrenuti sledecu sekvencu komandi:</td>
    <td>Pokrenuti sledecu sekvencu komandi:</td>
 </tr>
 <tr>
    <td>    - php artisan serve <br>
            zatim u drugom terminalu: <br>
            - php artisan key:generate <br>
            - php artisan migrate:fresh <br>
            - php artisan db:seed
            </td>
    <td>- docker-compose build <br>
        - docker-compose up</td>
 </tr>
</table>

U slučaju javljanja greške pri pokretanju aplikacije preko Docker-a <br>
"ERROR  Command "migrate:fresh " is not defined. Did you mean one of these? ..." <br>
Potrebno je promeniti "End of line Sequence" na LF u nekom od editora za fajl u direktorijumu aplikacije unutar <i>'docker/8.2/script.sh'</i>

## Članovi tima
- Janko Štrkalj 618-2019 jankokg26@gmail.com Linkedin - https://www.linkedin.com/in/janko-%C5%A1trkalj-62bb09253/
- Desimir Dimović 627-2019 desimirdimovic@gmail.com Linkedin - www.linkedin.com/in/desimir-dimovic-334b4a25a
- Marko Živanović 656-2019 marko.ziv@hotmail.com
- Marko Đokić 640-2019 markojh13@gmail.com Linkedin - https://www.linkedin.com/in/marko-djokic-030951192/
- ChatGPT by OpenAI 