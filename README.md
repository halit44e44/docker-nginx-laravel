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

## 💻 SUNUCU ERROR
'.docker/entrypoint.sh' dosyasındaki '#!/bin/bash' komutunu '#!/bin/sh' ile değiştirin.


