FROM nginx:latest
LABEL maintainer="diego.martinez@gasmobi.com"

ENV NGINX_DIR /etc/nginx
ENV NGINX_CONF_DIR $NGINX_DIR/conf.d

RUN apt-get update && apt-get install -y vim

# Config nginx
COPY default.conf $NGINX_CONF_DIR
COPY nginx.conf $NGINX_DIR 

# run
CMD ["nginx", "-g", "daemon off;"]
