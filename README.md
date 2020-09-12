# laravel
I have created 2 migration job_post and job_apply

I have placed the sql file on the root of the project

For creating a user hit the below url:
http://127.0.0.1:8000/api/register 
params are :
name:amit
email:amit@gmail.com
password:amit@123

For craeting the new post hit the following url:
http://127.0.0.1:8000/api/create-post
params are:
title:Lravel developer
description:new vacancy
vacancy:5

For  apllying the post hit the following url:
http://127.0.0.1:8000/api/apply-post
params:
job_id:1
user_id:2
