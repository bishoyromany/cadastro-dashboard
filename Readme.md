### How To Set Up This Dashboard

1. Install PHP And A Local Server [nginx/Apache].
2. Edit `dashboard/configs.php` File To Setup The Database Configs.
3. Import the database file that exist in `dashboard/sql/db.sql`.

### How To Login To The Dashboard

1. Visit URL 'https://your-domain-name/dashboard'.
2. Default Login Details Are:
   1. Username: `admin`.
   2. Password: `password`

### How To Edit Timezone

1. Open phpmyadmin or your database work branch application.
2. Go to `configs` table.
3. Search for `TIME_ZONE` key name, then change its value to the timezone you need.
