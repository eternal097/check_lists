## Выполнил: Карачёв Игорь

## Содержание тестового задания:

PHP с использованием фреймворка (Yii2 или Laravel)
Необходимо реализовать сервис чек листов:
1. Админка:
- Управление админами с разграничением прав;
- Управление пользователями с возможностью блокировки;
- Управление кол-вом возможных чек-листов у пользователя (в зависимости от
роли админа, необходимо ограничивать данный функционал);
- Просмотр чек листов.
2. Пользовательская часть:
- Регистрация / Авторизация;
- Создать/Удалить чек лист (учитывать настройки возможного кол-ва);
- Добавить/Удалить пункт в чек лист;
- Отметить выполнен/не выполнен пункт;
- Получить список чек листов;
- Получить список пунктов чеклиста с указанием выполнен/не выполнен.

## Описание проекта:

Сервис чеклистов на языке PHP с использованием фреймворка Laravel.

## Подготовительные действия:

1. Клонировать репозиторий на ваш компьютер командой git clone https://github.com/eternal097/check_lists.git;
2. Необходимо предварительно сохдать базу данных и указать парамерты подключения к бд в файле .env, копировав файл
.env.example без расширения .example.
3. Из корня папки проекта в терминале выполнить следующие команды:
- composer install;
- composer update;
- php artisan key:generate;
- php artisan migrate --seed;

## Информация о доступах:

Логин и пароль для супер-администратора:
- superadmin@example.com;
- secret123;

Логин и пароль для администратора №1:
- admin@example.com;
- secret123;

Логин и пароль для администратора №2:
- admin2@example.com;
- secret123;

## Как запустить проект:

Из корня папки проекта в терминале выполнить php artisan serve и перейти в браузере по полученному адресу в терминале.
