#!/bin/bash

grunt

php php/scripts/buildPages.php --buildLiveSite

#scp -r * brianpilati@learn-something-new-today.com:~/public_html
rsync -avzrmc --delete src/* brianpilati@learn-something-new-today.com:~/public_html
