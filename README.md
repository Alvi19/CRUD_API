## Install

1. **Clone Repository**

```bash
git clone https://github.com/Alvi19/CRUD_API.git
cd CRUD_API
composer install
cp .env.example .env
```

2. **Buka `.env` lalu ubah baris berikut sesuai dengan databasemu yang ingin dipakai**

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username_database
DB_PASSWORD=password_database

# URL API eksternal untuk pencarian data
EXTERNAL_API_URL=https://contoh-api-eksternal.com/endpoint
```

3. **Instalasi website**

```bash
php artisan key:generate
php artisan migrate
```

4. **Jalankan website**

```bash
php artisan serve
```

5. **Buat Akun Admin via Tinker**

```bash
php artisan tinker
>>> use App\Models\User;
use Illuminate\Support\Facades\Hash;

User::create([
    'name' => 'Admin',
    'email' => 'admin@example.com',
    'password' => Hash::make('password'),
    'role' => 'admin'
]);
>>> exit
```
