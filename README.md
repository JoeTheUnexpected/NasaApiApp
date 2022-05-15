#NASA API app

Сделал небольшую интеграцию с NASA API. Приложение показывает:
1. Фотографию дня
2. Снимки марсохода Curiosity по выбранной дате
3. Результаты поиска в базе NASA по запросу

Команды:
1. Сборка образа: `docker build -t nasa-api-image .`
2. Запуск контейнера: `docker run --rm -d -p 8181:8181 --name nasa-api-container nasa-api-image`
3. Завершение работы: `docker stop nasa-api-container`