<h2 align="center">
  Laravel-Nginx-MySQL-Redis Container
</h2>
<br>

## 🚀 Teknolojiler

- [PHP 8.1.3](https://php.net)
- [Laravel 9](https://php.net)
- [Xdebug 3](https://xdebug.org/)
- [Nginx](https://nginx.com/)
- [MySQL](https://mysql.com)
- [Docker](https://docker.com)
- [Redis](https://redis.io/)

## ⚙️ Setup & Run
1- Repoyu klonlayın.
2- env.example dosyasını '.docker/app/env' dosyasının içerisine yapıştırın.
3- docker komutunu terminalden çalıştırın.
```
# docker-compose up -d
```  
Tarayıcı URL http://localhost:8000  
Laravel Sayfasını Görebilirsiniz.

<h2 align="center">
  ÖNEMLİ LÜTFEN OKUYUN
</h2>

## 💻 SUNUCU ERROR

1. Adım -> [.docker/entrypoint.sh] içerisindeki '#!/bin/bash' komutunu '#!/bin/sh' ile değiştirin.
2. Adım -> Tekrardan değiştirdiğiniz '#!/bin/sh' komutunu tekrardan '#!/bin/bash' ile değiştirin.
3. Adım -> APP sunucusunun gereksinimleri yüklemesini bekleyin. İnternet hızınıza bağlı olarak değişkenlik gösterebilir.


## TEST
docker-composer exec app bash


