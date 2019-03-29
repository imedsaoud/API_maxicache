# Proxy_cache

Proxy_cache is a script written in PHP for security by transferring the client request to the original source as soon as one of the following errors is detected:

- The image does not exist at the host
- The provided image format is not supported

Proxy_cache also give you the image adapted for your device (Desktop | Mobile | Tablet)

## Installation 

1- Create Db

- Launch mysql  :  `mysql -u root -p` 
- Copy the mysql file in your sql

2- Run

- cd in the script directory
- ```php -S localhost:8080```

3- How it works ?

- Go to your brower and copy after the 'Host url'  /// 'source imageurl'
Ex: localhost:8080/html/index.php///user.oc-static.com/files/6001_7000/6410.jpg

---