#!/bin/bash

type -p curl 2>/dev/null || sudo apt install curl -y
sudo curl -fsSL https://cli.github.com/packages/githubcli-archive-keyring.gpg | dd of=/usr/share/keyrings/githubcli-archive-keyring.gpg \
&& sudo chmod go+r /usr/share/keyrings/githubcli-archive-keyring.gpg \
&& echo "deb [arch=$(dpkg --print-architecture) signed-by=/usr/share/keyrings/githubcli-archive-keyring.gpg] https://cli.github.com/packages stable main" | sudo tee /etc/apt/sources.list.d/github-cli.list > /dev/null \
&& sudo apt update \
&& sudo apt install gh -y
gh auth login --with-token $GITHUB_TOKEN
git clone https://github.com/RestoringPride/RestoringPride.org /home/RestoringPride.org
cp RestoringPride.org/wp-content/themes/** /home/site/wwwroot/wp-content/themes/
cp RestoringPride.org/wp-content/plugins/** /home/site/wwwroot/wp-content/plugins/
cp RestoringPride.org/wp-content/uploads/** /home/site/wwwroot/wp-content/uploads/
