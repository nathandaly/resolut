# Docker PHP-FPM (Symfony 4)

## Clone

Clone the repository to the root of your Symfony 4 installation.
`git clone git@github.com:nathandaly/Dockerphp7.git ./docker`

## Configure

You can update the MySQL credentials and ports in the `./docker/docker-compose.yml` file.

## Run

```bash
cd ./docker
docker-compose build
docker-compose up -d
```
