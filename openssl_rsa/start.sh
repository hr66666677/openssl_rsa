#!/bin/bash

# 启动nginx和php服务
service nginx start
service php5-fpm start

# 保持容器运行
tail -f /var/log/nginx/access.log