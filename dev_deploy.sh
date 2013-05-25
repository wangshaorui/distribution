#!/usr/bin/env sh
# Only for Ubuntu server 12.04 LTS
# Need sudo

apt-get update -y
apt-get install git nginx php5 php5-cli php5-curl php5-fpm php5-mcrypt php5-sqlite php5-mysql -y

mkdir -p /var/www
cd /var/www

git clone https://github.com/Gwill/distribution.git distribution
cd /var/www/distribution
git checkout -b develop origin/develop

chown -R www-data:www-data /var/www/distribution
chmod -R 755 /var/www/distribution


cat>/etc/nginx/sites-available/distribution<<EOF
server {
    listen 9527;

    root /var/www/distribution/public;
    index index.php index.html index.htm;

    server_name localhost;

    location / {
        try_files \$uri \$uri/ /index.php?\$args;
    }
    
    location ~ \.php$ {
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_index index.php;
        include fastcgi_params;
    }
}     
EOF

ln -s /etc/nginx/sites-available/distribution /etc/nginx/sites-enabled/distribution

service nginx restart
service php5-fpm restart

