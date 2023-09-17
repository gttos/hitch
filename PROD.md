<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Set UP Droplet

### Connect Droplet and RUN
- ssh root@164.92.226.224
- sudo apt install make
- sudo apt  install docker-compose

### Create a not root User
- adduser gtto
- usermod -aG sudo gtto
- sudo gpasswd -a gtto docker
- exit

### Copy root SSH Key to new user
- ssh root@164.92.226.224 
###### Create the folder if it doesn't already exist:
- mkdir /home/gtto/.ssh
###### Make the directory only executable by the user:
- chmod 700 /home/gtto/.ssh
###### Copy the authorized_keys file that contains your public key:
- sudo cp /root/.ssh/authorized_keys /home/gtto/.ssh/authorized_keys
###### Make everything in .ssh owned by your user:
- sudo chown -R gtto:gtto /home/gtto/.ssh
###### Make it readable only by your user:
- sudo chmod 600 /home/gtto/.ssh/authorized_keys
- exit

## Clone Project from GitHub


## Install
- mv .env.example .env
- mv docker-compose.prod.yml docker-compose.yml

###### Copy local .env.prod data inside .env
- make fresh-start

## COPY node_modules to server
- rsync -avz ./node_modules gtto@164.92.226.224:/home/gtto/hitch/
- rsync -avz ./public gtto@164.92.226.224:/home/gtto/hitch/public

