# Zadanie rekrutacyjne - Fun-Media (PHP) - 1

## Cel i zakres dostawy
Niniejszy projekt jest zadaniem rekrutacyjnym. Składa się z dwóch katalogów:
1. `src` - katalog zawierający kod źródłowy aplikacji podzielony domenowo na wyjątki (katalog `exceptions`), 
      model danych (katalog `model`) oraz serwisy (katalog `service`). <br>Plik `main.php` może zostać wykorzystany do uruchomienia aplikacji.
2. `tests` - katalog zawierający testy jednostkowe aplikacji (klasa `MicroprocessorSimulatorTest`)

oraz plików `composer.json`, `project.md` i `readme.md`.

## Wymagania sprzętowe
Projekt do działania nie wymaga dodatkowego sprzętu.

## Wymagania systemowe
Poniżej zostały wypisane wersje interpreterów, bibliotek potrzebnych do poprawnego uruchomienia aplikacji:
1. PHP w wersji co najmniej 8.1
2. Menadżer paczek Composer w wersji 2
3. PHPUnit w wersji co najmniej 9.5

Aplikacja została uruchomiona na natywnym interpreterze PHP8.1 dla systemów operacyjnych: Windows 10 (i 11),
MacOs 11+ oraz Ubuntu 20.

## Dodatkowe wymagania systemowe biblioteki PHPUnit
PHPUnit do działania wymaga dodatkowych modułów PHP: `ext-dom` oraz `ext-mbstring`.
Przed uruchomieniem testów należy upewnić się, że wskazane moduły zostały zainstalowane, uruchomione
i działają poprawnie.

## Uruchmienie aplikacji
Przed uruchomieniem aplikacji należy upewnić się, że używana wersja interpretera PHP to co najmniej 8.1, a także
wszystkie potrzebne zależności zostały pobrane i zainstalowane przy użyciu menadżera paczek `composer`.

### Instalacja zależności
Do pobrania zależności należy wykorzystać menadżera paczek Composer (komenda `composer update` uruchamiana
w głównym katalogu projektu).

### Uruchamianie aplikacji
Plik `src/main.php` służy do bieżącego testowania kodu. Zostały umieszczone w nim wszystkie potrzebne importy. 
Do uruchomienia programu służy komenda `php ./src/main.php` wywołana w głównym katalogu projektu.

### Uruchamianie testów
Do uruchamiania testów należy wykorzystać plik binarny biblioteki PHPUnit. Jako argument należy przekazać ścieżkę
do katalogu z testami jednostkowymi (komenda `./vendor/bin/phpunit ./tests/` wywołana w głównym katalogu projektu).<br/>
**Pierwsze dwa testy: `testEnvironmentSetUpAssertTrue` oraz `testEnvironmentSetUpAssertFalse` 
służą do testowania poprawności konfiguracji środowiska.**

