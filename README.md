# E-mail Service Project
## Yazılım Hakkında

### Görev:
Mail gönderimi sağlayan bir servsi oluşturulması. İki farklı alt yapı ile çalışan servisin olası bir servisin hata vermesi durumunda diğer servisi kullanarak hatayı kullanıcıya yansıtmayarak diğer servis üzerinden mail gönderilmesi.

- Programlama Dili : **PHP**
- Kullanılan Framework : **Laravel**

## Projeyi Çalıştırma

Projeyi clone yaptıktan sonra ilk olarak, komut ekranını açarak aşağıdaki kodu çalıştırmanız gerekiyor. 

```
composer install 
```
**Not :** Komutun çalışması için composer'ın bilgisyarınızda kurulu olması gerekmektedir!

.Env dosyasının oluşturulması için proje dizinine gidip aşağıdaki komut ile yada manuel olarak .env.example dosyasının bir kopyasını .env olarak oluşturabilirsiniz
```
cp .env.example .env 
```

**Mail Servislerinin doğru bir şekilde çalışması için .env dosyasınıza size mail olarak ilettiğim api key'lerini eklemeniz gerekmektedir.**

Test kodlarını çalıştırmak için aşağıdaki komutu çalıştırabilirsiniz.
```
php artisan test 
```

Projeyi dilerseniz localhost aracılığıyla açabilir yada aşağıdaki komut ile http://127.0.0.1:8000/ adresinde çalıştırabilirsiniz.
```
php artisan serve
```
**Not :** Burada belirlenen adresin front-end projesinde de doğru bir şekilde ayarlanması gerekmektedir!

**Api Dökümantasyon Linki:**  [Dökümantasyon](https://documenter.getpostman.com/view/11272295/UVkmSHkt).

## Projenin işleyişi 
Projede kullanılmak üzere bir MAilService sınıfı tanımladım. İşlemlerin hepsi bu servis üzerinden gerçekleştirilecek şekilde ayarlandı. Serviste kullanılacak alt yapılar esnek tutulduğu için istenildiği gibi yeni mail hizmetleri eklenip çıkarılabilir. Mail gönderimi her hizmette farklı olabileceğinden dolayı her hizmet için yeni bir sınıf eklenip MailService sınıfına tanıtılmalıdır. Yeni eklenen sınıflar MailServiceInterface interface'inden implement edilmelidir. 

MailService sınıfımız gelen istekleri işleyip hata alınması durumunda farklı servislerde deneme yapacaktır. Tüm servislerden olumsuz yanıt alınması durumunda kullanıcıya hata mesajı gösterilecektir. 

### Front-end
Front-end kısmında html-css-jquery kullandım. Back-end ağırlıklı ilerlemek istediğim için vuejs kullanmadım. Front-end kısmında projeyi indirip direkt çalıştırabilirsiniz..
[Front-end Projesi](https://github.com/ibrahimcadirci/emailServie-frontend).



