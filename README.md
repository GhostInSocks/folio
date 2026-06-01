# folio. – Minimalistična platforma za spletne portfelje

**folio.** je lahka in minimalistična spletna aplikacija, zasnovana po vzorcu **MVC (Model-View-Controller)** v programskem jeziku PHP. Ustvarjalcem (oblikovalcem, programerjem, fotografom) omogoča hitro in estetsko predstavitev njihovih del brez odvečnih vizualnih motenj.

## Ključne funkcionalnosti
- **Discover (Domača stran):** Pregledna mrežna postavitev (grid) vseh objavljenih projektov.
- **Dinamično filtriranje:** Hitro preklapljanje med 6 kategorijami (Design, Development, Photography, Writing, Motion, Branding) s pomočjo Vanilla JavaScripta na klientski strani (brez osveževanja strani).
- **Napreden iskalnik:** Iskalna vrstica v glavi spletnega mesta, ki z enim vnosom sočasno preišče naslove projektov, vsebino opisov in uporabniška imena avtorjev.
- **Podroben pregled (Detail view):** Predstavitev posameznega projekta s hero sliko čez 1/3 zaslona, okroglo značko kategorije in lepo berljivim opisom.
- **Uporabniški sistem:** Varna registracija in prijava uporabnikov (gesla so kriptirana z `password_hash`).
- **Nadzorna plošča (CRUD):** Prijavljeni uporabniki lahko na svojem profilu dodajajo, urejajo in brišejo svoje objave, sistem pa avtomatsko posodobi vsebino.

## Tehnologije
- **Backend:** PHP
- **Baza podatkov:** MySQL
- **Frontend:** HTML5, CSS, JavaScript

## Navodila za namestitev in zagon
1. Prenesite projekt in ga kopirajte v mapo lokalnega strežnika (npr. `xampp/htdocs/folio`).
2. V programu PHPMyAdmin ustvarite novo podatkovno bazo z imenom `folio`.
3. Uvozite priloženo SQL skripto (`baza.sql`), ki ustvari tabele in naloži začetnih 6 kategorij ter testne podatke.
4. Prepričajte se, da so podatki za povezavo v datoteki `DBInit.php` pravilni (lokalni strežnik, uporabniško ime `root`, brez gesla).
5. Odprite brskalnik in obiščite `http://localhost/folio/index.php`.
6. Uporabniško ime: `admin`, Geslo: `admin123`
