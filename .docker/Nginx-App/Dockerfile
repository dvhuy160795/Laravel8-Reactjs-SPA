FROM nginx:1.18

RUN apt-get update
RUN apt-get install curl -y
RUN curl -sL https://deb.nodesource.com/setup_11.x | bash -
RUN apt-get -y install nodejs
RUN npm install
RUN apt-get install -y nano

COPY nginx.conf /etc/nginx/nginx.conf

