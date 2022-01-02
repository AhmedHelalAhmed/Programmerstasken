## The idea
Webhosting company provides customer support via email. They record reply waiting time,
type of question, category, and service. To improve customer satisfaction, they need an
analytical tool to evaluate these data

## Tools

- PHP 8.0.0
- Composer
- Docker/docker-compose

## Install

``` 
docker-compose up  
docker-compose exec web /bin/bash ## this will open ssh interface in it do the next commands
composer install 
php index.php
```

## Example

### Input 
7
C 1.1 8.15.1 P 15.10.2012 83 <br>
C 1 10.1 P 01.12.2012 65 <br>
C 1.1 5.5.1 P 01.11.2012 117 <br>
D 1.1 8 P 01.01.2012-01.12.2012 <br>
C 3 10.2 N 02.10.2012 100 <br>
D 1 * P 8.10.2012-20.11.2012 <br>
D 3 10 P 01.12.2012 <br>

### Output
83 <br>
100 <br>
`-` 



