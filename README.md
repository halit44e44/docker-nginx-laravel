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
- Repoyu klonlayın.
- docker komutunu terminalden çalıştırın.
```
# docker-compose up -d
```  
- Tarayıcı URL http://localhost:8000
- Redis 127.0.0.1:6489
- phpMyAdmin localhost:9090
- Sunucu: db
- user: root
- password: root

<h2 align="center">
  ÖNEMLİ LÜTFEN OKUYUN
</h2>

## 💻 SUNUCU ERROR (APP HTTP 304)
- Lütfen tüm docker imagesler indikten sonra ortalama 2 dakika bekleyiniz. Ardından '.docker/entrypoint.sh' dosyasının her hangi bir alanında
bir boşluk bırakarak dosyayı kayıt edelim. Sunucu kendini otomatikmen başlatacaktır. Başlatmadığı taktirde bir kaç dakika daha bekleyip aynı işlemi yapalım. Bu işlem
kök dizinine entrypoint.sh dosyasını kaydetmemizi sağlar.

-Hatanın sebebi dosya yetki hatası ve kurulum aşamasında o bosyayı bulamıyor. yetki ile çözmek için lütfen sunucu kapanmadan bu komutları 'var/www' içerisinde çalıştıralım.
```
# chmod 777 .docker/entrypoint.sh
```  



## Cron Job  
Sunucu ayağa kaldırılırken configiration ayarlamaları yapılmaktadır.

- Terminalden bu kodu çalıştırdığınız taktirde bağlı olduğumuz servisin tüm Userlarını çekecek ve bunların kayıt işlemlerini
gerçekleştirecektir.
- Gelen API servisine yeni bir kullanıcı eklendiği taktirde bu komut farklı olan users'ı bulup Db ye kayıt ettirecek.
- Dosyaları - app->Console->Commands->NewCustomerCheck.php
```
# php artisan cp:new-users-check
```  

- Yukarıda manuel olarak yapabileceğimiz işlemi Cron olarak ayarlandı. Kernel.php içerisinde 'saatlik, günlük veya belli bir tarihe vs'
olarak ayarlanabilir ve users servisine otomatik bağlanıp DB de olmayan kullanıcıları sorgulayacaktır ve DB ye ekleyecektir.
- Dosyası - app->Console->Kernel.php
```
# php artisan schedule:run
```  

## Hatırlatmalar 
- DB'e  sürekli veri eklemesini önlemek için ufak bir koşul koymak zorunda kaldım. Orada ki koşul yazılan kodlara dahil değildir
daha temiz çalışabilmek için bunu yaptım.

-------

- Panelde 2 adet sayfa bulunmaktadır.
- Users sayfası dediğiniz gibi API den verileri çekip DB'ye kayıt ediyor ve Redis Cacheden okuyor.
- Colors Tablosu Direkt Olarak API dan verileri çekiyor.

