FROM nginx

RUN apt-get update
RUN apt-get install curl -y
RUN curl -sL https://deb.nodesource.com/setup_11.x  | bash -
RUN apt-get -y install nodejs
RUN npm install
RUN apt-get install -y nano

# debian日本語・日本時間設定
RUN apt-get install -y locales
RUN sed -i -e 's/# ja_JP.UTF-8 UTF-8/ja_JP.UTF-8 UTF-8/' /etc/locale.gen
RUN locale-gen
ENV LANG ja_JP.UTF-8
ENV LC_ALL ja_JP.UTF-8
ENV LANGUAGE ja_JP:ja
ENV TZ Asia/Tokyo

COPY nginx.conf /etc/nginx/nginx.conf

