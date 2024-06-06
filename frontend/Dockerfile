FROM node:lts-alpine
RUN npm install -g http-server

WORKDIR /client

COPY package*.json ./

COPY . .

EXPOSE 3000
CMD [ "http-server", "dist", "-p 3000" ]