#!/bin/bash

gh auth login --with-token $GITHUB_TOKEN
git clone https://github.com/RestoringPride/RestoringPride.org /home/RestoringPride.org
cp RestoringPride.org/wp-content/themes/** /home/site/wwwroot/wp-content/themes/
cp RestoringPride.org/wp-content/plugins/** /home/site/wwwroot/wp-content/plugins/
cp RestoringPride.org/wp-content/uploads/** /home/site/wwwroot/wp-content/uploads/
