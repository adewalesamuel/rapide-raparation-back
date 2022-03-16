#!/bin/bash

echo Rapide deployment start...
project_name="rapide-reparation"
rapide_front_path="/Users/macbookair/Projects/rapide-front-end"
rapide_back_path="/Users/macbookair/Projects/$project_name"
php_script=php

echo build react app from $rapide_front_path
cd $rapide_front_path
npm run build

echo copy build folder to $rapide_back_path/public
cp -r $rapide_front_path/build/* $rapide_back_path/public

echo move $rapide_back_path/public/index.html to $rapide_back_path/resources/views
mv $rapide_back_path/public/index.html $rapide_back_path/resources/views

echo rename index.blade to index.blade.back in $rapide_back_path/resources/views
mv $rapide_back_path/resources/views/index.blade.php $rapide_back_path/resources/view/index.blade.back.php

echo rename index.html to index.blade in $rapide_back_path/resources/views
mv $rapide_back_path/resources/views/index.html $rapide_back_path/resources/views/index.blade.php

echo optimize laravel project
cd $rapide_back_path
$php_script artisan optimize
$php_script artisan config:clear

echo compress laravel project
cd $rapide_back_path/../ 
zip -r $project_name-prod.zip ./$project_name

