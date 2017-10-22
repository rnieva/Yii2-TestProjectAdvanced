YII2 Test Project 
(first steps from [Yii2-TestProject](https://github.com/rnieva/Yii2-TestProject))


In this app a user can generate different ldif (Lightweight Directory Access Protocol)  plain text data to create a ldap record.

*Project based in Yii2 Advanced Application Template

Requirements

Data Base structure

create table DataUser (userid int(50) not null auto_increment primary key, username varchar(35), firstname varchar(35), surname varchar(50), ldifData varchar(10000), usercreated Date);

Slappasswd is used to generate an userPassword value suitable for use with ldap

. sudo apt-get install slapd
To generate {SHA} code,
slappasswd -h "{SHA}" -s userpassword
result: {SHA}xzuimCxVt+rQ5AmKkvcivbOjs9g=
