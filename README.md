# Mapon Task

This is a flat PHP project based on the requirements requested at the link below:
https://docs.google.com/document/d/11uIJCSORoN09xekOAAhRgypjg90DkEeCATLmm2y5eNw/edit

### Home View
<img src="https://raw.githubusercontent.com/Lesnier/Project-Mapon/9926914c467a8ebb62c720f631b6f2f7b1efa258/assets/img/1.jpg" width="500" >

### Login View
<img src="https://raw.githubusercontent.com/Lesnier/Project-Mapon/9926914c467a8ebb62c720f631b6f2f7b1efa258/assets/img/2.jpg" width="500" >

### Main View
<img src="https://raw.githubusercontent.com/Lesnier/Project-Mapon/9926914c467a8ebb62c720f631b6f2f7b1efa258/assets/img/3.jpg" width="500" >
<img src="https://raw.githubusercontent.com/Lesnier/Project-Mapon/9926914c467a8ebb62c720f631b6f2f7b1efa258/assets/img/4.jpg" width="500" >

### Unit Test
<img src="https://github.com/Lesnier/Project-Mapon/blob/master/assets/img/5.jpg?raw=true" width="500" >


## Installation guide

- Download as zip or clone this repository to your root server.

- If you want to change the name of the folder modify the file **config.php**  (opcional)

- Replace your api-key for Google Map JS API at the end of the file *app/views/Main/main.php*
<img src="https://raw.githubusercontent.com/Lesnier/Project-Mapon/master/assets/img/remplaceapikey.jpg?raw=true" width="500" >



- Make sure you have the Composer package manager installed. Then run the following script:

    `composer install`

- Run the following command to run an automated test of the main functionalities of the project.

    `phpunit --testsuite UnitTests`
    
- Access the website at the link http://<**server**>/mapon-project

- Access credentials **email:** `test@dev.com` **password:** `123456`


## The architecture

- This is a based on MVC architecture application and Client Server architecture.

![alt tag](https://raw.githubusercontent.com/Lesnier/Project-Mapon/9926914c467a8ebb62c720f631b6f2f7b1efa258/assets/img/Imagen%20de%20Arquitectura.png)

- According to the Architecture model established by SAS

![alt tag](https://raw.githubusercontent.com/Lesnier/Project-Mapon/9926914c467a8ebb62c720f631b6f2f7b1efa258/assets/img/SAS%20Arquitecture.png)