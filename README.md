# Sistem Tambang
## Screenshots

![App Screenshot](https://github.com/dwicahyo1512/Sistem-Tambang/tree/main/dokumen/Cover.png)
![App Screenshot](https://github.com/dwicahyo1512/learn-slicing-svelte/blob/main/public/Cover1.png)
![App Screenshot1](https://github.com/dwicahyo1512/Sistem-Tambang/tree/main/dokumen/Cover-1.png)


## Installation

Install my-project

```bash
  git clone https://github.com/dwicahyo1512/Sistem-Tambang.git

  cd Sistem-Tambang

  composer Install

  cp .env.example .env
```

Setting your database
    
 ```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=(your database)
DB_USERNAME=root
DB_PASSWORD=
```

Migrate Database

```bash
php artisan migrate --seed
```

```bash
php artisan key:generate
```

run project
```bash
php artisan serve
```

