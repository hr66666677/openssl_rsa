FROM ctftraining/base_image_nginx_mysql_php_56:latest

WORKDIR /var/www/html

# 单行长命令，无续行符（wdb项目风格）
RUN apk update && apk add --no-cache openssl && rm -rf /var/cache/apk/*

COPY src/ /var/www/html/
COPY start.sh /start.sh
RUN chmod +x /start.sh

EXPOSE 80
CMD ["/start.sh"]