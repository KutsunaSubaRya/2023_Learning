## NTNU CSIE 資料庫理論的實作作業

NTNU CSIE 113 蘇子權 SubaRya

## Tech Stack
* LNMP (LEMP)

## Setup Environment
* 搭建環境十分推薦先看過我的 Blog
* [LNMP 安裝遇到的問題筆記](https://blog.subarya.me/2023/05/19/LNMP%20%E5%AE%89%E8%A3%9D%E9%81%87%E5%88%B0%E7%9A%84%E5%95%8F%E9%A1%8C%E7%AD%86%E8%A8%98/)
* 以及完整的教學影片 [How to Install and Configure LEMP stack](https://www.youtube.com/watch?v=ZcSlEDJPN0g&t=191s&ab_channel=HappyGhost) 也可以 (Optional)

## 使用方法
* 我預設您看到這步驟已經將 local 端的環境都架設齊全，包含 phpMyAdmin 和裡面的 Table 都建立好 (Codebase 中的 `db_class.sql`)。
* 只要進到 DB_homework 的 folder 執行 `./start.sh` 即可，記得先將此 chmod 成 executable 的。

## nginx.conf

* 以下是我的 `nginx.conf` 以供參考

```conf

#user http;
worker_processes  1;

#error_log  logs/error.log;
#error_log  logs/error.log  notice;
#error_log  logs/error.log  info;

#pid        logs/nginx.pid;


events {
    worker_connections  1024;
}


http {
    types_hash_max_size 4096;
    server_names_hash_bucket_size 128;
    include       mime.types;
    default_type  application/octet-stream;

    #log_format  main  '$remote_addr - $remote_user [$time_local] "$request" '
    #                  '$status $body_bytes_sent "$http_referer" '
    #                  '"$http_user_agent" "$http_x_forwarded_for"';

    #access_log  logs/access.log  main;

    sendfile        on;
    #tcp_nopush     on;

    #keepalive_timeout  0;
    keepalive_timeout  65;

    #gzip  on;

    server {
        listen       80;
        server_name  localhost;

        #charset koi8-r;

        #access_log  logs/host.access.log  main;

        location / {
            root   /usr/share/nginx/html/db_final;
            index index.html index.htm index.php;
        }

        #error_page  404              /404.html;

        # redirect server error pages to the static page /50x.html
        #
        error_page   500 502 503 504  /50x.html;
        location = /50x.html {
            root   /usr/share/nginx/html/db_final;
        }

        # proxy the PHP scripts to Apache listening on 127.0.0.1:80
        #
        #location ~ \.php$ {
        #    proxy_pass   http://127.0.0.1;
        #}

        # pass the PHP scripts to FastCGI server listening on 127.0.0.1:9000
        #
        location ~ \.php$ {
            root           /usr/share/nginx/html/db_final;
            fastcgi_pass   unix:/run/php-fpm/php-fpm.sock;
            fastcgi_index  index.php;
            fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
            include        fastcgi_params;
	}

        # deny access to .htaccess files, if Apache's document root
        # concurs with nginx's one
        #
        location ~ /\.ht {
            deny  all;
        }
    }


    # another virtual host using mix of IP-, name-, and port-based configuration
    #
    #server {
    #    listen       8000;
    #    listen       somename:8080;
    #    server_name  somename  alias  another.alias;

    #    location / {
    #        root   html;
    #        index  index.html index.htm;
    #    }
    #}


    # HTTPS server
    #
    #server {
    #    listen       443 ssl;
    #    server_name  localhost;

    #    ssl_certificate      cert.pem;
    #    ssl_certificate_key  cert.key;

    #    ssl_session_cache    shared:SSL:1m;
    #    ssl_session_timeout  5m;

    #    ssl_ciphers  HIGH:!aNULL:!MD5;
    #    ssl_prefer_server_ciphers  on;

    #    location / {
    #        root   html;
    #        index  index.html index.htm;
    #    }
    #}

}
```