```cp .env .example```
Copy file .env cập nhật thêm tên database

```composer install```

```php artisan migrate```
Chạy lệnh thêm các bảng vào sql

```php artisan db:seed --class=PermissionSeeder```
Chạy seeder để thêm các permission vào các module


