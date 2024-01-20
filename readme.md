# Затраченное время
На решение тестового задания было потрачено 6 часов + 2 часа на настройку окружения

# Инструкция по развёртыванию
1. Клонируем репозиторий
```bash
git clone https://github.com/zhenyasayapin/zebomba-games-test-app.git
```
2. Преименовываем src/.env.bak в src/.env
```bash
mv src/.env.bak src/.env
```
3. Запускаем docker compose
```bash
docker compose up
```
4. Установливаем зависимости composer
```bash
./phpexec.sh composer install
```
5. Выполняем миграции
```bash
./phpexec.sh bin/console d:m:m
```
6. Открываем в браузере ссылку с данными в query string, [например](http://localhost:8000/user_auth?access_token=07b38cd0e778340eb40b25e005476ce8&id=1&first_name=%D0%98%D0%B2%D0%B0%D0%BD&last_name=%D0%98%D0%B2%D0%B0%D0%BD%D0%BE%D0%B2&city=%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0&country=%D0%A0%D0%BE%D1%81%D1%81%D0%B8%D1%8F&sig=5427b31460cd807aab7e184364960958)



